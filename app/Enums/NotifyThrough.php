<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum NotifyThrough: int
{
    use EnumOperations;
    /**
     * Mail
     */
    case Mail = 0;

    /**
     * Database
     */
    case DB = 1;

    /**
     * Mail and Database
     */
    case MDB = 2;

    public static function values(): array
    {
        return[
            self::Mail->value,
            self::DB->value,
            self::MDB->value,
        ];
    }
}
