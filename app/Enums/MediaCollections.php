<?php

namespace App\Enums;

enum MediaCollections: string
{
    use EnumOperations;

    case Users = 'users';
}
