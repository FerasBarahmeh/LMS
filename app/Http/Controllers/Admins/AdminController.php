<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\MigrateToInstructorRequest;
use App\Http\Requests\MigrateToStudentRequest;
use App\Interfaces\Repositories\Admins\DBAdminInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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

    public function migrateToInstructor(MigrateToInstructorRequest $request, string $id): RedirectResponse
    {
        return $this->admin->migrateToInstructor($request, $id);
    }

    public function migrateToStudent(MigrateToStudentRequest $request, string $id): RedirectResponse
    {
        return $this->admin->migrateToStudent($request, $id);
    }
}
