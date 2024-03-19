<?php

namespace App\Services\Models;

use App\Enums\MediaCollections;
use App\Models\Course;

class CourseService
{
    protected Course $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function hasCourseImage()
    {
        return optional($this->course->getFirstMedia(MediaCollections::CourseImage->value))->getUrl() ?? false;
    }

    public function courseImage(): string
    {
        return $this->hasCourseImage() ?? asset('img/courses/img-empty.png');
    }

    public function hasCoursePromotion()
    {
        return optional($this->course->getFirstMedia(MediaCollections::CoursePromotional->value))->getUrl() ?? false;
    }

    public function coursePromotion(): string
    {
        return $this->hasCoursePromotion() ?? asset('img/courses/promotional-img-empty.png');
    }

    public function hasLecture(): bool
    {
        return $this->course->lectures != null;
    }

    public function hasDescription(): bool
    {
        return $this->course->description != null;
    }

    public function hasCongratulationsMessage(): bool
    {
        return $this->course->has_congratulations_message != null;
    }

    public function hasWelcomeMessage(): bool
    {
        return $this->course->has_welcome_message != null;
    }

    public function isFree(): bool
    {
        return floor((int)$this->course->price) == 0;
    }

    public function publishable(): bool
    {
        return $this->course->setting->publishStatus->publish_status;
    }

    public function isPublish(): bool
    {
        return  $this->course->setting->publishStatus->publish_status == true;
    }

    public function __destruct()
    {
        unset($this->course);
    }
}
