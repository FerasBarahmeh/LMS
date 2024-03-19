<?php

namespace App\Models;

use App\Services\Models\CourseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'semester',
        'description',
        'price',
        'is_free',
        'enrollment_number',
        'congratulations_message',
        'welcome_message',
        'academic_subject_id',
        'user_id',
    ];

    /**
     * Get user added course
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Setting course
     */
    public function setting(): HasOne
    {
        return $this->hasOne(CourseSetting::class);
    }

    /**
     * Get sections for this course
     *
     * @return HasMany
     */
    public function sections(): HasMany
    {
        return $this->hasMany(CourseSection::class);
    }

    /**
     * Get object from service model class
     */
    public function service(): CourseService
    {
        return (new CourseService($this));
    }
}
