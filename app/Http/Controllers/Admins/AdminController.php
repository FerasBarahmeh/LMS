<?php

namespace App\Http\Controllers\Admins;

use App\Enums\Privileges;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\MigrateToInstructorRequest;
use App\Http\Requests\MigrateToStudentRequest;
use App\Http\Requests\ToggleStatusRequest;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * The path to the blade files for this controller
     */
    private const string BLADE_HUB = 'backend.admins.';

    private array $messages = [
        'migrate-instructor-success' => "Great news! The privilege level for instruct :param has been successfully downgraded to student.",
        'migrate-instructor-field' => 'Oops! The system could\'t downgrade the instructor. Please try again later.',
        'migrate-student-success' => "Great news! The privilege level for instructor :param has been successfully upgraded to teacher status. Congratulations!",
        'change-status-success' => 'Status update: The status for user :param has been successfully modified.',
        'change-status-fail' => 'Failed to update status for user :param. Please check and try again.',
    ];

    public function index(): View
    {
        return view(self::BLADE_HUB . 'dashboard');
    }

    public function users(): View
    {
        $users = User::where('id', '!=', auth()->id())
            ->paginate(10);

        return view(self::BLADE_HUB . 'users.index', [
            'users' => $users,
        ]);
    }

    public function instructors(): View
    {
        $instructors = User::where('privilege', Privileges::Instructor->value)
            ->paginate(10);

        return view(self::BLADE_HUB . 'instructors.index', [
            'instructors' => $instructors,
        ]);
    }

    public function students(): View
    {
        $instructors = User::where('privilege', Privileges::Student->value)
            ->paginate(10);

        return view(self::BLADE_HUB . 'students.index', [
            'instructors' => $instructors,
        ]);
    }

    public function toggleStatus(ToggleStatusRequest $request, string $id): RedirectResponse
    {
        $request->validated();

        $instructor = User::find($id);

        $instructor->status = $instructor->status == Status::InActive->value ? Status::Active->value : Status::InActive->value;

        if ($instructor->save()) {
            return $this->backWith(key: 'change-status-success', params: $instructor->name);
        }

        return $this->backWith(key: 'change-status-fail', params: $instructor->name);
    }

    public function migrateToInstructor(MigrateToInstructorRequest $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        $user->privilege = Privileges::Instructor->value;

        if ($user->save() && Instructor::create(['user_id' => $user->id])) {
            return $this->backWith(key: 'migrate-student-success', params: $user->name);
        }

        return $this->backWith(key: 'migrate-student-field');
    }

    public function migrateToStudent(MigrateToStudentRequest $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        $user->privilege = Privileges::Student->value;
        if ($user->save() && $user->instructor->delete()) {
            return $this->backWith('migrate-instructor-success', params: $user->name);
        }
        return $this->backWith('migrate-instructor-field', params: $user->name);
    }

    public function backWith(string $key, string|array|null $params=null): RedirectResponse
    {
        return Redirect::back()->with($key, $this->getMessage(key: $key, params: $params));
    }

    public function getMessage(string $key, string|array|null $params = null)
    {
        if ($params == null) return $this->messages[$key];
        if (is_string($params)) $params = [':params' => $params];

        return strtr($this->messages[$key], $params);
    }
}
