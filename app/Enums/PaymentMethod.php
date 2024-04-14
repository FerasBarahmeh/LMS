<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum PaymentMethod: int
{
    use EnumOperations;

    case Free = 0;
    case Cash = 1;

    public static function name($value): string
    {
        return match ($value) {
            self::Free->value => 'free',
            self::Cash->value => 'cash',
        };
    }
}
