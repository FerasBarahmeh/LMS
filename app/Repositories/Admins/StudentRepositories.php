<?php

namespace App\Repositories\Admins;

use App\Interfaces\Repositories\Admins\DBStudentInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StudentRepositories implements DBStudentInterface
{

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('backend/students/dashboard');
    }
}
