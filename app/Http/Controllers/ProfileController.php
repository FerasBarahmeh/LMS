<?php

namespace App\Http\Controllers;

use App\Enums\{Theme};
use App\Http\Requests\{ProfileUpdateRequest};
use App\Models\User;
use App\Traits\Controllers\FlashMessages;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\{Auth, Redirect, Validator};
use Illuminate\Validation\{Rule, ValidationException};
use Illuminate\View\View;

class ProfileController extends Controller
{
    use FlashMessages;

    /**
     * The path to the blade files for this controller
     */
    private const string BLADE_HUB = 'profile.';

    /**
     * The route name for this controller
     */
    private const string HOME_ROUTE_NAME = 'profile.edit';

    /**
     * Constructor controller
     */
    public function __construct()
    {
        $this->messages = [
            'profile-update-fail' => 'Fail  Updated Profile',
            'profile-update-successfully' => 'Profile Updated Successfully',
        ];
    }

    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view(self::BLADE_HUB . 'index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Edit use information
     */
    public function edit(Request $request): View
    {
        return view(self::BLADE_HUB . 'edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $saved = $request->user()->save();

        if (!$saved)
            return $this->backWith('profile-update-fail');

        return $this->backWith('profile-update-successfully');

    }

    /**
     * Delete the user's account.
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

    /**
     * Change profile picture for user
     */
    public function changeProfilePicture(Request $request): void
    {
        $blob = $request->json('image');
        $user = User::find(auth()->id());
        $user->service()->updateProfilePicture($blob);
    }

    /**
     * Change theme app
     *
     * @throws ValidationException
     */
    public function changeTheme(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'theme' => ['required', Rule::enum(Theme::class)],
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages([
                'fail-change-theme' => 'not valid theme',
            ]);
        }

        $request->user()->theme = $request->input('theme');
        $request->user()->save();

        return Redirect::back();
    }
}
