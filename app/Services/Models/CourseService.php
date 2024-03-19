<?php

namespace App\Services\Models;

use App\Enums\MediaCollections;
use App\Models\Course;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class CourseService
{
    protected Course $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function courseImage(): string
    {
        $url = $this->hasCourseImage();
        return ! $url ? asset('img/courses/img-empty.png') : $url;
    }

    public function coursePromotion(): string
    {
        $url = $this->hasCoursePromotion();
        return  !$url ? asset('img/courses/promotional-img-empty.png') : $url;
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
        } catch (FileDoesNotExist|FileIsTooBig $e) {
        }
    }

    public function hasCourseImage()
    {
        return optional($this->course->getFirstMedia(MediaCollections::CourseImage->value))->getUrl() ?? false;
    }

    public function hasCoursePromotion()
    {
        return optional($this->course->getFirstMedia(MediaCollections::CoursePromotional->value))->getUrl() ?? false;
    }

    public function hasLecture(): bool
    {
        return $this->course->setting->publishStatus->has_lectures;
    }

    public function hasDescription(): bool
    {
        return $this->course->setting->publishStatus->has_description;
    }

    public function hasCongratulationsMessage(): bool
    {
        return $this->course->setting->publishStatus->has_congratulations_message;
    }

    public function hasWelcomeMessage(): bool
    {
        return $this->course->setting->publishStatus->has_welcome_message;
    }

    public function isFree(): bool
    {
        return floor((int)$this->course->price) == 0;
    }

    public function publishable(): bool
    {
        $coursePublishStatus = $this->course->setting->publishStatus;

        return $coursePublishStatus->has_lecture
            && $coursePublishStatus->has_description
            && $coursePublishStatus->has_course_image
            && $coursePublishStatus->has_promotional_video
            && ($coursePublishStatus->is_free || $coursePublishStatus->has_price)
            && $coursePublishStatus->has_congratulations_message
            && $coursePublishStatus->has_welcome_message;
    }

    public function isPublish(): bool
    {
        return $this->course->setting->publishStatus->publish_status == true;
    }

    public function hasImage(): bool
    {
        return $this->course->hasMedia(MediaCollections::CourseImage->value);
    }

    public function hasPromotional(): bool
    {
        return $this->course->hasMedia(MediaCollections::CoursePromotional->value);
    }

    public function updatePublishStatus()
    {
        $coursePublishStatus = $this->course->setting->publishStatus;

        $coursePublishStatus->publish_status = $this->publishable();

        return
            $coursePublishStatus->publish_status
                ? $coursePublishStatus->save()
                : false;
    }

    public function __destruct()
    {
        unset($this->course);
    }
}
