<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum Semesters: string
{
    use EnumOperations;

    case First = 'first';

    case Second = 'second';

    case Summer = 'summer';
}
