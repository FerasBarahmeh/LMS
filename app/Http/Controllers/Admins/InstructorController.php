<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Admins\DBInstructorInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class InstructorController extends Controller
{
    private DBInstructorInterface $instructor;

    public function __construct(DBInstructorInterface $instructor)
    {
        $this->instructor = $instructor;
    }

    public function dashboard(): \Illuminate\Foundation\Application|Factory|View|Application
    {
        return $this->instructor->dashboard();
    }

}
