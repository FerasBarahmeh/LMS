<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\ChangePrivilegeNotification;
use App\Notifications\ChangeStatusNotification;
use App\Notifications\WelcomeNotification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $user->notify(new WelcomeNotification());
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->isDirty('status')) {
            $user->notify(new ChangeStatusNotification());
        }
        if ($user->isDirty('privilege')) {
            $user->notify(new ChangePrivilegeNotification());
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
