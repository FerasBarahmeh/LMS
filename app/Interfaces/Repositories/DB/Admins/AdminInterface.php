<?php

namespace App\Interfaces\Repositories\DB\Admins;

use App\Http\Requests\MigrateToInstructorRequest;
use App\Http\Requests\MigrateToStudentRequest;
use App\Http\Requests\ToggleStatusRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface AdminInterface
{
    public function index();

    public function instructors();

    public function users(): View;

    public function students(): View;

    public function toggleStatus(ToggleStatusRequest $request, string $id): RedirectResponse;

    public function migrateToInstructor(MigrateToInstructorRequest $request, string $id): RedirectResponse;

    public function migrateToStudent(MigrateToStudentRequest $request, string $id): RedirectResponse;
}
