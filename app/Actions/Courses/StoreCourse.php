<?php

namespace App\Actions\Courses;

use App\Models\Course;

class StoreCourse
{
    public static function execute(array $date)
    {
        $course = Course::create($date);
        $course->setting()->create();
        $course->setting->publishStatus()->create();
        return $course;
    }
}
