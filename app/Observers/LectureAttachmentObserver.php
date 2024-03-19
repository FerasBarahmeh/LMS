<?php

namespace App\Observers;

use App\Actions\Courses\UpdateAttributesDependingOnPublishStatus;
use App\Models\LectureAttachment;

class LectureAttachmentObserver
{
    /**
     * Handle the LectureAttachment "created" event.
     */
    public function created(LectureAttachment $lectureAttachment): void
    {
        UpdateAttributesDependingOnPublishStatus::execute($lectureAttachment->lecture->section->course);
    }

    /**
     * Handle the LectureAttachment "updated" event.
     */
    public function updated(LectureAttachment $lectureAttachment): void
    {
        //
    }

    /**
     * Handle the LectureAttachment "deleted" event.
     */
    public function deleted(LectureAttachment $lectureAttachment): void
    {
        //
    }

    /**
     * Handle the LectureAttachment "restored" event.
     */
    public function restored(LectureAttachment $lectureAttachment): void
    {
        //
    }

    /**
     * Handle the LectureAttachment "force deleted" event.
     */
    public function forceDeleted(LectureAttachment $lectureAttachment): void
    {
        //
    }
}
