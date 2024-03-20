<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum Currency: int
{
    use EnumOperations;

    case JOD = 0;

    /**
     * Get name by value
     */
    public static function name($value): string
    {
        return match ((int)$value) {
            self::JOD->value => 'JOD',
        };
    }
}
