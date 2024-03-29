<?php

namespace App\Observers;

use App\Actions\Courses\UpdateAttributesDependingOnPublishStatus;
use App\Models\CourseSection;

class CourseSectionObserver
{
    /**
     * Handle the CourseSection "created" event.
     */
    public function created(CourseSection $courseSection): void
    {
        //
    }

    /**
     * Handle the CourseSection "updated" event.
     */
    public function updated(CourseSection $courseSection): void
    {
        if ($courseSection->isDirty('published')) {
            UpdateAttributesDependingOnPublishStatus::execute($this->section->course);
        }
    }

    /**
     * Handle the CourseSection "deleted" event.
     */
    public function deleted(CourseSection $courseSection): void
    {
        //
    }

    /**
     * Handle the CourseSection "restored" event.
     */
    public function restored(CourseSection $courseSection): void
    {
        //
    }

    /**
     * Handle the CourseSection "force deleted" event.
     */
    public function forceDeleted(CourseSection $courseSection): void
    {
        //
    }
}
