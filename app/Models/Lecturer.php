<?php

namespace App\Models;

use App\Enums\TypeAttachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecturer extends Model
{
    protected $fillable = [
        'name',
        'description',
        'course_section_id',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(CourseSection::class, 'course_section_id');
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(LectureAttachment::class);
    }

    public function hasAttachments(): bool
    {
        return count(value: $this->attachments) >= 1;
    }

    public function hasVideoAttachment(): bool
    {
        return $this->attachments()->where('type_attachment', operator: TypeAttachments::Video->value)->limit(1)->count() >= 1;
    }
}
