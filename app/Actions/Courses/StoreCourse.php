<?php

namespace App\Actions\Courses;

use App\Models\Course;

class StoreCourse
{
    public static function execute(array $data)
    {
        $course = Course::create($data);
        $setting = $course->setting()->create();
        $setting->publishStatus()->create();
        EnrollmentToCourseForFreeAction::execute($course);
        return $course;
    }
}
