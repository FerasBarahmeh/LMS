<?php

namespace App\Models;

use App\Services\Models\CoursePublicationStateService;
use Illuminate\Database\Eloquent\Model;

class CoursePublicationState extends Model
{
    protected $fillable = [
        'publishable',
        'curriculum_compass',
        'has_description',
        'has_course_image',
        'has_promotional_video',
        'is_free',
        'has_price',
        'has_congratulations_message',
        'has_welcome_message',
        'course_setting_id',
    ];

    public $timestamps = false;

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CourseSetting::class);
    }

    public function service(): CoursePublicationStateService
    {
        return (new CoursePublicationStateService($this));
    }
}
