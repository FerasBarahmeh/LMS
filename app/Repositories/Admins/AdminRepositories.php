<?php

namespace App\Repositories\Admins;

use App\Interfaces\Repositories\Admins\DBAdminInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminRepositories implements DBAdminInterface
{

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('backend/admins/dashboard');
    }
}
