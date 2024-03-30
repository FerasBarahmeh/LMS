<?php

namespace App\Services\Models;

use App\Enums\MediaCollections;
use App\Enums\TypeAttachments;
use App\Models\Course;
use App\Models\CoursePublicationState;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia;

class CourseService
{
    protected Course $course;

    public CoursePublicationState $publishStatus;

    public function __construct(Course $course)
    {
        $this->course = $course;
        $this->publishStatus = $this->course->setting->publishStatus;
    }

    public function clearImage(): false|HasMedia
    {
        return $this->hasImage() ? $this->course->clearMediaCollection(MediaCollections::CourseImage->value) : false;
    }

    public function clearPromotional(): false|HasMedia
    {
        return $this->hasPromotional() ? $this->course->clearMediaCollection(MediaCollections::CoursePromotional->value) : false;
    }

    /**
     * Update course image
     */
    public function updateImageFromRequest(string $requestName): Course
    {
        $this->course
            ->addMediaFromRequest(key: $requestName)
            ->usingFileName('course-image.png')
            ->toMediaCollection(MediaCollections::CourseImage->value);
        return $this->course;
    }

    /**
     * Update promotional for course
     */
    public function updatePromotionalFromRequest(string $requestName): Course
    {
        $this->course
            ->addMediaFromRequest(key: $requestName)
            ->usingFileName('promotional.mp4')
            ->toMediaCollection(MediaCollections::CoursePromotional->value);
        return $this->course;
    }

    public function urlCourseImage(): string
    {
        return $this->course->getFirstMediaUrl(MediaCollections::CourseImage->value);
    }

    public function urlCoursePromotion(): string
    {
        return $this->course->getFirstMediaUrl(MediaCollections::CoursePromotional->value);
    }

    public function curriculumCompass(): bool
    {
        return Course::with(['sections' => function ($query) {
                $query->where('published', true)->with(['lectures' => function ($query) {
                    $query->where('published', true)->with(['attachments' => function ($query) {
                        $query->where('type_attachment', TypeAttachments::Video->value);
                    }]);
                }]);
            }])->find(id: $this->course->id)->sections->pluck('lectures')->flatten()->pluck('attachments')->flatten()->count() > 0;
    }

    public function hasDescription(): bool
    {
        return $this->course->description != null;
    }

    public function hasCongratulationsMessage(): bool
    {
        return $this->course->congratulations_message != null;
    }

    public function hasWelcomeMessage(): bool
    {
        return $this->course->welcome_message != null;
    }

    public function isFree(): bool
    {
        return floor((int)$this->course->price) == 0;
    }

    public function publishable(): bool
    {
        return $this->publishStatus->curriculum_compass
            && $this->publishStatus->has_description
            && $this->publishStatus->has_course_image
            && $this->publishStatus->has_promotional_video
            && ($this->publishStatus->is_free || $this->publishStatus->has_price)
            && $this->publishStatus->has_congratulations_message
            && $this->publishStatus->has_welcome_message;
    }

    public function published(): bool
    {
        return $this->course->setting->published;
    }

    public function hasImage(): bool
    {
        return $this->course->hasMedia(MediaCollections::CourseImage->value);
    }

    public function hasPromotional(): bool
    {
        return $this->course->hasMedia(MediaCollections::CoursePromotional->value);
    }

    public function updatePublishableStatus(): bool
    {
        $this->publishStatus->publishable = $this->publishable();
        return $this->course->setting->save();
    }

    public function dispatchPublished(): bool
    {
        $this->course->setting->published = $this->publishStatus->publishable && !$this->course->setting->published;
        return $this->publishStatus->publishable && $this->course->setting->save();
    }

    public static function publishedCoursesWith(...$relations): Builder
    {
        return Course::with(relations: $relations)->whereHas('setting', function ($query) {
            $query->where('published', true);
        });
    }

    public static function publishedCourse(): Builder
    {
        return Course::with('user', 'category', 'setting', 'sections', 'media')->whereHas('setting.publishStatus', function ($query) {
            $query->where('publishable', true);
        });
    }

    public function __destruct()
    {
        unset($this->course);
        unset($this->publishStatus);
    }
}
