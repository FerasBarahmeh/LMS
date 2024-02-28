<?php

namespace App\Traits\Enums;

use ReflectionClass;

trait EnumOperations
{

    public static function values(): array
    {
        $values = [];
        foreach (static::cases() as $case) {
            $values[] = $case->value;
        }
        return $values;
    }

    public static function names(): array
    {
        $names  =[];
        foreach (static::cases() as $case) {
            $names[] = $case->name;
        }
        return $names;
    }

    public static function namesLower(): array
    {
        $names = [];
        foreach (static::cases() as $case) {
            $names[] = strtolower($case->name);
        }
        return $names;
    }
}
