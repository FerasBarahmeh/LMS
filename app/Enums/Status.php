<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum Status: string
{
    use EnumOperations;

    case Active = 'active';
    case InActive = 'inactive';
}
