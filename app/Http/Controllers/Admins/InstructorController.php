<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class InstructorController extends Controller
{
    private const string BLADE_HUB = 'backend.instructors.';

    public function dashboard(): View
    {
        return view(self::BLADE_HUB . 'dashboard');
    }
}
