<?php

namespace App\Services\Models;

use App\Enums\TypeAttachments;
use App\Models\Lecture;

class LectureService
{
    protected Lecture $lecture;

    public function __construct(Lecture $lecture)
    {
        $this->lecture = $lecture;
    }

    public function hasAttachments(): bool
    {
        return count(value: $this->lecture->attachments) >= 1;
    }

    public function hasVideoAttachment(): bool
    {
        return $this->lecture->attachments()
                ->where('type_attachment', operator: TypeAttachments::Video->value)
                ->limit(1)
                ->count() >= 1;
    }
}
