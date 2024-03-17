<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum Semesters: int
{
    use EnumOperations;

    case First = 1;

    case Second = 2;

    case Complement = 3;

    public static function name(int $value): string
    {
        return match ($value) {
            self::First->value => 'First',
            self::Second->value => 'Second',
            self::Complement->value => 'Complement',
        };
    }

    public static function isFirst($value): bool
    {
        return self::First->value === (int)$value;
    }

    public static function isSecond($value): bool
    {
        return self::Second->value === (int)$value;
    }

    public static function isComplement($value): bool
    {
        return self::Complement->value === (int)$value;
    }
}
