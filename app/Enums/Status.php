<?php

namespace App\Enums;

enum Status: string
{
    use EnumOperations;

    case Active = 'active';
    case InActive = 'inactive';
}
