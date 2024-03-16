<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum TypeAttachments: string
{
    use EnumOperations;

    case File = '1';

    case Video = '2';

    /**
     * Get name by value
     */
    public static function name($value): string
    {
        return match ($value) {
            self::File->value => 'Doc',
            self::Video->value => 'Video',
        };
    }
}
