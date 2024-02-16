<?php

namespace App\Enums;

enum Privileges: string
{
    use EnumOperations;

    case Admin = 'admin';
    case Instructor = 'instructor';
    case Student = 'student';
}
