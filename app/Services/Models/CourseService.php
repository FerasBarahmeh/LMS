<?php

namespace App\Services\Models;

use App\Enums\MediaCollections;
use App\Models\Course;
use App\Models\CoursePublicationState;
use Illuminate\Database\Eloquent\Builder;

class CourseService
{
    protected Course $course;

    private const string EMPTY_IMAGE_PATH = 'img/courses/img-empty.png';
    private const string EMPTY_PROMOTIONAL_PATH = 'img/courses/promotional-empty.png';

    public CoursePublicationState $publishStatus;

    public function __construct(Course $course)
    {
        $this->course = $course;
        $this->publishStatus = $this->course->setting->publishStatus;
    }

    public function courseImage(): string
    {
        $url = $this->urlCourseImage();
        return !$url ? asset(self::EMPTY_IMAGE_PATH) : $url;
    }

    public function coursePromotion(): string
    {
        $url = $this->urlCoursePromotion();
        return !$url ? asset(self::EMPTY_PROMOTIONAL_PATH) : $url;
    }

    public function clearImage(): false|\Spatie\MediaLibrary\HasMedia
    {
        return $this->hasImage() ? $this->course->clearMediaCollection(MediaCollections::CourseImage->value) : false;
    }

    public function clearPromotional(): false|\Spatie\MediaLibrary\HasMedia
    {
        return $this->hasPromotional() ? $this->course->clearMediaCollection(MediaCollections::CoursePromotional->value) : false ;
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

    public function urlCourseImage()
    {
        return optional($this->course->getFirstMedia(MediaCollections::CourseImage->value))->getUrl() ?? false;
    }

    public function urlCoursePromotion()
    {
        return optional($this->course->getFirstMedia(MediaCollections::CoursePromotional->value))->getUrl() ?? false;
    }

    public function hasLecture(): bool
    {
        return
            $this->course->sections->isNotEmpty()
            && $this->course->sections->some(function ($section) {
                return $section->lectures->isNotEmpty();
            });
    }

    public function curriculumCompass(): bool
    {
        // TODO: append publishing status for lecture and section as factor
        return $this->hasLecture();
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
        // TODO: apply And SQL Query
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
