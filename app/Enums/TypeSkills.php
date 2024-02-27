<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum TypeSkills: string
{
    use EnumOperations;

    case Soft = '0';
    case Technical = '1';
}
