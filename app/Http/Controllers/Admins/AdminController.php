<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Admins\DBAdminInterface;
use Illuminate\Http\Request;

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
}
