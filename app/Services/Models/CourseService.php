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
            $this->course
                ->getFirstMedia(MediaCollections::CourseImage->value)
                ->getUrl()
            ??
            asset('img/courses/empty.png');
    }

    public function __destruct()
    {
        unset($this->course);
    }
}
