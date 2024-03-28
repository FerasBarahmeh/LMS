<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSetting extends Model
{
    protected $fillable = ['currency', 'published', 'course_id'];

    public $timestamps = false;

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function publishStatus(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CoursePublicationState::class);
    }
}
