<?php

namespace App\Interfaces\Repositories\Admins;

use App\Http\Requests\ToggleStatusRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


interface DBUnifiedInterface
{
    /**
     * Toggle status user
     *
     */
    public function toggleStatus(ToggleStatusRequest $request, string $id): RedirectResponse;
    public function changeTheme(Request $request): RedirectResponse;
}
