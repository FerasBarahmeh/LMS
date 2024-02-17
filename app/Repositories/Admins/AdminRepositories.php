<?php

namespace App\Repositories\Admins;

use App\Enums\Privileges;
use App\Http\Controllers\Traits\Helper;
use App\Interfaces\Controllers\StrictVariablesInterface;
use App\Interfaces\Repositories\Admins\DBAdminInterface;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminRepositories implements DBAdminInterface, StrictVariablesInterface
{
    use Helper;

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view($this->bladePath('dashboard'));
    }

    public function instructors(): View|Factory|\Illuminate\Foundation\Application|Application
    {

        $instructors = User::where('privilege', Privileges::Instructor->value)
            ->paginate(10);

        return view($this->bladePath('instructors/index'), [
            'instructors' => $instructors,
        ]);

    }

    /**
     * @inheritDoc
     */
    public function bladePath(string $blade): string
    {
        return 'backend/admins/' . $blade;
    }
}
