<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum Reactions: int
{
    use EnumOperations;

    case Like = 0;

    case Dislike = 1;
}
