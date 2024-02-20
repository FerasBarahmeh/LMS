<?php

namespace App\Repositories;

use App\Http\Requests\ProfileUpdateRequest;
use App\Interfaces\Controllers\StrictVariablesInterface;
use App\Interfaces\Repositories\Admins\DBProfileInterface;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileRepositories implements DBProfileInterface, StrictVariablesInterface
{

    /**
     * @inheritDoc
     */
    public function index(Request $request): View
    {
        return view($this->bladePath('index'), [
            'user' => $request->user(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function edit(Request $request): View
    {
        return view($this->bladePath('edit'), [
            'user' => $request->user(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $saved = $request->user()->save();

        if (! $saved)
            return Redirect::route('profile.index')->with('profile-update-fail', 'Fail  Updated Profile');

        return Redirect::route('profile.index')->with('profile-update-successfully', 'Profile Updated Successfully');
    }

    /**
     * @inheritDoc
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function bladePath(string $blade=null): string
    {
        return 'profile.'.$blade;
    }

    public function changeProfilePicture(Request $request)
    {
        $blob = $request->json('image');
        $user = User::find(auth()->id());
        $user->clearMediaCollection();

        $user->addMediaFromBase64($blob)
            ->usingFileName('profile-picture-'.$user->id.'.png')
            ->toMediaCollection('users');
        return '';
    }
}
