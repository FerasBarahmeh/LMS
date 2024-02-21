<?php

namespace App\Repositories\Admins;

use App\Enums\Privileges;
use App\Interfaces\Repositories\Admins\DBInstructorInterface;
use App\Models\User;
use App\Traits\Controllers\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class InstructorRepositories implements DBInstructorInterface
{
    use Helper;

    private const  string VIEW_PATH = 'backend/instructors/';

    public function dashboard(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('backend/instructors/dashboard');
    }

    public function index(): View|Factory|\Illuminate\Foundation\Application|Application
    {

        $instructors = User::where('privilege', Privileges::Instructor->value)
                ->paginate(10);

        return view($this->getView('index'), [
            'instructors' => $instructors,
        ]);
    }
}
