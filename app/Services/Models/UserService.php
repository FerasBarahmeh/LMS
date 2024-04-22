<?php

namespace App\Services\Models;

use App\Enums\MediaCollections;
use App\Models\Course;
use App\Models\User;

class UserService
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function hasProfilePicture()
    {
        return optional($this->user->getFirstMedia(MediaCollections::ProfilePicture->value))->getUrl() ?? false;
    }

    public function profilePicture(): string|false
    {
        $url = $this->hasProfilePicture();
        return !$url ? asset('img/users/profile-picture-empty.png') : $url;
    }

    /**
     * Update profile picture for user
     */
    public function updateProfilePicture($blob): void
    {
        if ($this->hasProfilePicture() !== false)
            $this->user->getFirstMedia(MediaCollections::ProfilePicture->value)->delete();

        $this->user->addMediaFromBase64($blob)
            ->usingFileName('profile.picture.png')
            ->toMediaCollection(MediaCollections::ProfilePicture->value);
    }

    public function isEnrolled($courseId): bool
    {
        return (Course::findOrFail($courseId))->users()->where('user_id', $this->user->id)->exists();
    }

    public function isNotEnrolled($courseId): bool
    {
        return !(Course::findOrFail($courseId))->users()->where('user_id', $this->user->id)->exists();
    }

    public function __destruct()
    {
        unset($this->user);
    }
}
