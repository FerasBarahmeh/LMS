<?php

namespace App\Observers;

use App\Actions\Courses\UpdateAttributesDependingOnPublishStatus;
use App\Models\Course;

class CourseObserver
{
    /**
     * Handle the Course "created" event.
     */
    public function created(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "updated" event.
     */
    public function updated(Course $course): void
    {
        if ($course->isDirty('description') || $course->isDirty('welcome_message') || $course->isDirty('congratulations_message')) {
            UpdateAttributesDependingOnPublishStatus::execute($course);
        }
    }

    /**
     * Handle the Course "deleted" event.
     */
    public function deleted(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "restored" event.
     */
    public function restored(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "force deleted" event.
     */
    public function forceDeleted(Course $course): void
    {
        //
    }
}
