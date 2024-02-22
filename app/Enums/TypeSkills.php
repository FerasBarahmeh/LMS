<?php

namespace App\Enums;

enum TypeSkills: string
{
    use EnumOperations;

    case Soft = '0';
    case Technical = '1';
}
