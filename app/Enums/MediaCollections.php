<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum MediaCollections: string
{
    use EnumOperations;

    case Users = 'users';
}
