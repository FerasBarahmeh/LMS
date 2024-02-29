<?php

namespace App\Repositories\Admins;

use App\Interfaces\Repositories\DB\Admins\InstructorInterface;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\View\View;

class InstructorRepositories implements InstructorInterface
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
