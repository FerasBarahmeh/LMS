<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum Privileges: string
{
    use EnumOperations;

    case Admin = 'admin';
    case Instructor = 'instructor';
    case Student = 'student';
}
