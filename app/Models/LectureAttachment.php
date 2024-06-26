<?php

namespace App\Models;

use App\Observers\LectureAttachmentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[ObservedBy(LectureAttachmentObserver::class)]
class LectureAttachment extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['type_attachment', 'lecture_id'];

    public function lecture(): BelongsTo
    {
        return $this->belongsTo(Lecture::class);
    }
}
