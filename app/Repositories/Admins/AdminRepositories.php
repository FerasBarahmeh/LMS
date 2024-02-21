<?php

namespace App\Repositories\Admins;

use App\Enums\MediaCollections;
use App\Enums\Privileges;
use App\Interfaces\Controllers\QuantumQuerierInterface;
use App\Interfaces\Repositories\Admins\DBAdminInterface;
use App\Models\User;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\View\View;

class AdminRepositories implements DBAdminInterface, QuantumQuerierInterface
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

    public static function setBladeHub(): void
    {
        self::$BLADES_HUB = 'backend.admins.';
    }

    public static function setCollection(): void
    {
        self::$COLLECTION = MediaCollections::Users->value;
    }
}
