<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ProfileUpdateRequest};
use App\Interfaces\Repositories\Admins\DBProfileInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private DBProfileInterface $profile;

    public function __construct(DBProfileInterface $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return $this->profile->index($request);
    }

    public function edit(Request $request): View
    {
        return $this->profile->edit($request);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        return $this->profile->update($request);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        return $this->profile->destroy($request);
    }

    public function changeProfilePicture(Request $request)
    {
        return $this->profile->changeProfilePicture($request);
    }

    public function changeTheme(Request $request): RedirectResponse
    {
        return $this->profile->changeTheme($request);
    }

}
