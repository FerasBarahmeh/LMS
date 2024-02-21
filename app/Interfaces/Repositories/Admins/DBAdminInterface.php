<?php

namespace App\Interfaces\Repositories\Admins;

use Illuminate\Contracts\View\View;

interface DBAdminInterface
{
    public function index();
    public function instructors();
    public function users(): View;
    public function students(): View;
}
