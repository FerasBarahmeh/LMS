<?php

namespace App\Interfaces\Repositories\DB\Admins;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

interface InstructorInterface
{
    /**
     * Show dashboard for instructor
     *
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function dashboard(): View|\Illuminate\Foundation\Application|Factory|Application;

}
