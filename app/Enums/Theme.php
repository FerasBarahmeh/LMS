<?php

namespace App\Enums;

use function Laravel\Prompts\search;

enum Theme: string
{
    use EnumOperations;

    case  Dim = '0';
    case  Light = '1';
}
