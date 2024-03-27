<?php

namespace App\Models;

use App\Observers\CourseObserver;
use App\Services\Models\CourseService;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[ObservedBy(CourseObserver::class)]
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(AcademicSubject::class, 'academic_subject_id');
    }

    public function getPriceAttribute($value): string
    {
        return ($value == 0) ? 'free' : $value;
    }

    /**
     * Get object from service model class
     */
    public function service(): CourseService
    {
        return (new CourseService($this));
    }
}
