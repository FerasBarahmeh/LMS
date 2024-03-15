<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\View\View;

class InstructorController extends Controller
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
