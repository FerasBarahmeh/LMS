<?php

namespace App\Services\Models;

use App\Actions\Courses\UpdateAttributesDependingOnPublishStatus;
use App\Enums\MediaCollections;
use App\Models\Course;
use App\Models\CoursePublicationState;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class CourseService
{
    protected Course $course;

    public CoursePublicationState $publishStatus;

    public function __construct(Course $course)
    {
        $this->course = $course;
        $this->publishStatus = $this->course->setting->publishStatus;
    }

    public function courseImage(): string
    {
        $url = $this->urlCourseImage();
        return !$url ? asset('img/courses/img-empty.png') : $url;
    }

    public function coursePromotion(): string
    {
        $url = $this->urlCoursePromotion();
        return !$url ? asset('img/courses/promotional-empty.png') : $url;
    }

    /**
     * Update course image
     */
    public function updateImage(): void
    {
        if ($this->hasImage())
            $this->course->getFirstMedia(MediaCollections::CourseImage->value)->delete();

        try {
            $this->course
                ->addMediaFromRequest('course_image')
                ->usingFileName('course-image.png')
                ->toMediaCollection(MediaCollections::CourseImage->value);
            UpdateAttributesDependingOnPublishStatus::execute($this->course);
        } catch (FileDoesNotExist|FileIsTooBig $e) {
        }
    }

    /**
     * Update promotional for course
     */
    public function updatePromotional(): void
    {
        if ($this->hasPromotional())
            $this->course->getFirstMedia(MediaCollections::CoursePromotional->value)->delete();

        try {
            $this->course
                ->addMediaFromRequest('course_promotional')
                ->usingFileName('promotional.mp4')
                ->toMediaCollection(MediaCollections::CoursePromotional->value);
            UpdateAttributesDependingOnPublishStatus::execute($this->course);
        } catch (FileDoesNotExist|FileIsTooBig $e) {
        }
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
        return $this->course->sections->isNotEmpty()
            && $this->course->sections->lectures->isNotEmpty();
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
        return $this->publishStatus->has_lecture
            && $this->publishStatus->has_description
            && $this->publishStatus->has_course_image
            && $this->publishStatus->has_promotional_video
            && ($this->publishStatus->is_free || $this->publishStatus->has_price)
            && $this->publishStatus->has_congratulations_message
            && $this->publishStatus->has_welcome_message;
    }

    public function isPublish(): bool
    {
        return $this->publishStatus->publish_status == true;
    }

    public function hasImage(): bool
    {
        return $this->course->hasMedia(MediaCollections::CourseImage->value) != null;
    }

    public function hasPromotional(): bool
    {
        return $this->course->hasMedia(MediaCollections::CoursePromotional->value) != null;
    }

    public function updatePublishStatus(): bool
    {
        $this->publishStatus->publish_status = $this->publishable();
        return $this->publishStatus->publish_status && $this->publishStatus->save();
    }

    public function __destruct()
    {
        unset($this->course);
        unset($this->publishStatus);
    }
}
