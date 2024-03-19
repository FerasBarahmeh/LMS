<?php

namespace App\Models;

use App\Services\Models\LectureService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecture extends Model
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

    public function service(): LectureService
    {
        return (new LectureService($this));
    }
}
