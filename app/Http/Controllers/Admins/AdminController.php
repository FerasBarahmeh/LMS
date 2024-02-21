<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Admins\DBAdminInterface;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    private DBAdminInterface $admin;

    public function __construct(DBAdminInterface $admin)
    {
        $this->admin = $admin;
    }

    public function index()
    {
        return $this->admin->index();
    }

    public function users(): View
    {
        return $this->admin->users();
    }


    public function instructors(): View
    {
        return $this->admin->instructors();
    }

    public function students(): View
    {
        return $this->admin->students();
    }
}
