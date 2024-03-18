<?php

namespace App\Services\Models;

use App\Enums\MediaCollections;
use App\Models\User;

class UserService
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function profilePicture(): string
    {
        return
            optional($this->user->getFirstMedia(MediaCollections::ProfilePicture->value))->getUrl()
            ?? asset('img/users/profile-picture-empty.png');
    }

    public function __destruct()
    {
        unset($this->user);
    }
}
