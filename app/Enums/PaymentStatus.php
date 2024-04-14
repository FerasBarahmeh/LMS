<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum PaymentStatus: int
{
    use EnumOperations;

    case Pending = 0;
    case Completed = 1;

    public static function name(PaymentStatus $value): string
    {
        $value = $value->value;
        return match ($value) {
            self::Pending->value => 'pending',
            self::Completed->value => 'completed',
        };
    }
}
