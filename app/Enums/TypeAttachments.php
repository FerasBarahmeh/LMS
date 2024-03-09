<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum TypeAttachments: string
{
    use EnumOperations;

    case File = '1';

    case Video = '2';
}
