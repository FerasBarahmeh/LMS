<?php

namespace App\Http\Controllers\Admins;

use App\Enums\MediaCollections;
use App\Enums\Privileges;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\MigrateToInstructorRequest;
use App\Http\Requests\MigrateToStudentRequest;
use App\Http\Requests\ToggleStatusRequest;
use App\Models\Instructor;
use App\Models\User;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    use QuantumQuerier;

    public function index(): View
    {
        return view(self::retrieveBlade('dashboard'));
    }

    public function users(): View
    {
        $users = User::where('id', '!=', auth()->id())
            ->paginate(10);

        return view(self::retrieveBlade('users.index'), [
            'users' => $users,
        ]);
    }

    public function instructors(): View
    {
        $instructors = User::where('privilege', Privileges::Instructor->value)
            ->paginate(10);

        return view(self::retrieveBlade('instructors.index'), [
            'instructors' => $instructors,
        ]);
    }

    public function students(): View
    {
        $instructors = User::where('privilege', Privileges::Student->value)
            ->paginate(10);

        return view(self::retrieveBlade('students.index'), [
            'instructors' => $instructors,
        ]);
    }

    public function toggleStatus(ToggleStatusRequest $request, string $id): RedirectResponse
    {
        $request->validated();

        $instructor = User::find($id);

        $instructor->status = $instructor->status == Status::InActive->value ? Status::Active->value : Status::InActive->value;

        if ($instructor->save()) {
            return Redirect::back()->with('change-status-success', "Status update: The status for user {$instructor->name} has been successfully modified.");
        }

        return Redirect::back()->with('change-status-fail', "Failed to update status for user {$instructor->name}. Please check and try again.");
    }

    public function migrateToInstructor(MigrateToInstructorRequest $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        $user->privilege = Privileges::Instructor->value;
        if ($user->save() && Instructor::create(['user_id' => $user->id])) {
            return redirect()->back()
                ->with('migrate-student-success',
                    "Great news! The privilege level for instructor {$user->name} has been successfully upgraded to teacher status. Congratulations!");
        }

        return Redirect::back()->with('migrate-student-field', 'Opp\'s ! The can\'t upgrade user now try again later plz.');
    }

    public function migrateToStudent(MigrateToStudentRequest $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        $user->privilege = Privileges::Student->value;
        if ($user->save() && $user->instructor->delete()) {
            return Redirect::back()->with('migrate-instructor-success', "Great news! The privilege level for instruct {$user->name} has been successfully downgraded to student.");
        }
        return Redirect::back()->with('migrate-instructor-field', 'Oops! The system could\'t downgrade the instructor. Please try again later.');
    }

    public static function setBladeHub(): void
    {
        self::$BLADES_HUB = 'backend.admins.';
    }

    public static function setCollection(): void
    {
        self::$COLLECTION = MediaCollections::User->value;
    }
}
