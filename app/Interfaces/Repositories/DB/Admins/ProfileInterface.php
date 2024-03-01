<?php

namespace App\Interfaces\Repositories\DB\Admins;

use App\Http\Requests\{ProfileUpdateRequest};
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface ProfileInterface
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

    public function changeTheme(Request $request): RedirectResponse;

}