<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum Currency: int
{
    use EnumOperations;

    case JOD = 0;
}
