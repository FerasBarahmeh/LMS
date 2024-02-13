<?php

namespace App\Repositories\Admins;

use App\Interfaces\Repositories\Admins\DBInstructorInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class InstructorRepositories implements DBInstructorInterface
{

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('backend/instructors/dashboard');
    }
}
