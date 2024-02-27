<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum Theme: string
{
    use EnumOperations;

    case  Dim = '0';
    case  Light = '1';
}
