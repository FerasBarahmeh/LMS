<?php

namespace App\Enums;

enum Privileges: string
{
    case Admin = 'admin';
    case Instructor = 'instructor';
    case Student = 'student';
}
