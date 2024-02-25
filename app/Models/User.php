<?php

namespace App\Models;

use App\Enums\Privileges;
use App\Enums\TypeSkills;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'designation',
        'website',
        'phone',
        'about',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function instructors()
    {
        return User::where('privilege', Privileges::Instructor->value)->get();
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function softSkills(): HasMany
    {
        return $this->hasMany(Skill::class)->where('type', '=',TypeSkills::Soft->value);
    }

    public function technicalSkills(): HasMany
    {
        return $this->hasMany(Skill::class)->where('type', "=", TypeSkills::Technical->value);
    }

    public function mediaAccounts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(AvailablePlatform::class, 'social_media_account', 'user_id', 'available_platform_id')
            ->withTimestamps()
            ->withPivot(['username'])
            ->as('mediaAccounts');
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }
}
