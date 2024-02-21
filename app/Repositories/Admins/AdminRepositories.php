<?php

namespace App\Repositories\Admins;

use App\Enums\MediaCollections;
use App\Enums\Privileges;
use App\Interfaces\Controllers\QuantumQuerierInterface;
use App\Interfaces\Repositories\Admins\DBAdminInterface;
use App\Models\User;

use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminRepositories implements DBAdminInterface, QuantumQuerierInterface
{
    use QuantumQuerier;

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view(self::retrieveBlade('dashboard'));
    }

    public function instructors(): View|Factory|\Illuminate\Foundation\Application|Application
    {

        $instructors = User::where('privilege', Privileges::Instructor->value)
            ->paginate(10);

        return view(self::retrieveBlade('instructors.index'), [
            'instructors' => $instructors,
        ]);

    }

    public static function setBladeHub(): void
    {
        self::$BLADES_HUB = 'profile.';
    }

    public static function setCollection(): void
    {
        self::$COLLECTION = MediaCollections::Users->value;
    }
}
