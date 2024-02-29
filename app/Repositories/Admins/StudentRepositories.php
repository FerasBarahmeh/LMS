<?php

namespace App\Repositories\Admins;

use App\Interfaces\Repositories\DB\Admins\StudentInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StudentRepositories implements StudentInterface
{

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('backend/students/dashboard');
    }
}
