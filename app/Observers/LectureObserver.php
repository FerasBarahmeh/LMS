<?php

namespace App\Observers;

use App\Actions\Courses\UpdateAttributesDependingOnPublishStatus;
use App\Models\Lecture;

class LectureObserver
{
    /**
     * Handle the Lecture "created" event.
     */
    public function created(Lecture $lecture): void
    {
        //
    }

    /**
     * Handle the Lecture "updated" event.
     */
    public function updated(Lecture $lecture): void
    {
        if ($lecture->isDirty('published')) {
            UpdateAttributesDependingOnPublishStatus::execute($lecture->section->course);
        }
    }

    /**
     * Handle the Lecture "deleted" event.
     */
    public function deleted(Lecture $lecture): void
    {
        //
    }

    /**
     * Handle the Lecture "restored" event.
     */
    public function restored(Lecture $lecture): void
    {
        //
    }

    /**
     * Handle the Lecture "force deleted" event.
     */
    public function forceDeleted(Lecture $lecture): void
    {
        //
    }
}
