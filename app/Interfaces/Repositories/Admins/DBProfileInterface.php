<?php

namespace App\Interfaces\Repositories\Admins;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ToggleStatusRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface DBProfileInterface
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View;

    /**
     * Edit profile page
     */
    public function edit(Request $request): View;

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse;

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse;

    public function changeProfilePicture(Request $request);

    public function toggleStatus(ToggleStatusRequest $request, string $id): RedirectResponse;

    public function changeTheme(Request $request): RedirectResponse;
}
