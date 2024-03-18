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

    public function courseImage(): string
    {
        return
            optional($this->course->getFirstMedia(MediaCollections::CourseImage->value))->getUrl()
            ?? asset('img/courses/img-empty.png');
    }

    public function coursePromotion(): string
    {
        return
            optional($this->course->getFirstMedia(MediaCollections::CoursePromotional->value))->getUrl()
            ?? asset('img/courses/promotional-img-empty.png');
    }

    public function __destruct()
    {
        unset($this->course);
    }
}
