<?php

namespace App\Traits\Enums;

use ReflectionClass;

trait EnumOperations
{

    public static function values()
    {
        $reflection = new ReflectionClass(static::class);
        $content = $reflection->getConstants();
        return array_map(fn($value) => $value->value, array_values($content));
    }

    public static function names(): array
    {
        $reflection = new ReflectionClass(static::class);
        $statusValues = $reflection->getConstants();
        return array_map('lcfirst', (array_keys($statusValues)));
    }
}
