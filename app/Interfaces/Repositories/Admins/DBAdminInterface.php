<?php

namespace App\Interfaces\Repositories\Admins;

use App\Http\Requests\MigrateToInstructorRequest;
use App\Http\Requests\MigrateToStudentRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface DBAdminInterface
{
    public function index();

    public function instructors();

    public function users(): View;

    public function students(): View;

    public function migrateToInstructor(MigrateToInstructorRequest $request, string $id): RedirectResponse;

    public function migrateToStudent(MigrateToStudentRequest $request, string $id): RedirectResponse;
}
