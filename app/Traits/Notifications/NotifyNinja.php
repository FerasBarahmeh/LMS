<?php

namespace App\Traits\Notifications;

use App\Enums\NotifyThrough;

trait NotifyNinja
{
    protected const  array THROUGH = [
        NotifyThrough::Mail->value => ['mail'],
        NotifyThrough::DB->value => ['database'],
        NotifyThrough::MDB->value => ['mail', 'database'],
    ];

    protected function notifyVia(string $notifyThrough): array
    {
        return self::THROUGH[$notifyThrough];
    }
}
