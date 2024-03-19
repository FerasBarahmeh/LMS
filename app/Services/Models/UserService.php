<?php

namespace App\Services\Models;

use App\Enums\MediaCollections;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\InvalidBase64Data;

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

        try {
            $this->user->addMediaFromBase64($blob)
                ->usingFileName('profile.picture.png')
                ->toMediaCollection(MediaCollections::ProfilePicture->value);
        } catch (FileDoesNotExist|FileIsTooBig|InvalidBase64Data|FileCannotBeAdded $e) {
        }
    }

    public function __destruct()
    {
        unset($this->user);
    }
}
