<?php

namespace App\Services\Models;

use App\Enums\TypeAttachments;
use App\Models\Lecturer;

class LectureService
{
    protected Lecturer $lecture;

    public function __construct(Lecturer $lecture)
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
