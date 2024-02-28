<?php

namespace App\Repositories\Admins;

use App\Interfaces\Repositories\Admins\DBInstructorInterface;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\View\View;

class InstructorRepositories implements DBInstructorInterface
{
    use QuantumQuerier;


    public function dashboard(): View
    {
        return view($this->retrieveBlade('dashboard'));
    }


    public static function setBladeHub(): void
    {
        self::$BLADES_HUB = 'backend.instructors.';
    }

}
