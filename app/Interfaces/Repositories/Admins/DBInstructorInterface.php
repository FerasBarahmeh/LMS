<?php

namespace App\Interfaces\Repositories\Admins;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

interface DBInstructorInterface
{
    /**
     * Show dashboard for instructor
     *
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function dashboard(): View|\Illuminate\Foundation\Application|Factory|Application;

    /**
     * Display all instructors
     *
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application;
}
