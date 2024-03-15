<?php

namespace App\Http\Controllers;

use App\Enums\MediaCollections;
use App\Enums\Theme;
use App\Http\Requests\{ProfileUpdateRequest};
use App\Models\User;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use QuantumQuerier;

    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view(self::retrieveBlade('index'), [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view(self::retrieveBlade('edit'), [
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
            return self::toHome('profile-update-fail', 'Fail  Updated Profile');

        return self::toHome('profile-update-successfully', 'Profile Updated Successfully');

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

    public function changeProfilePicture(Request $request)
    {
        $blob = $request->json('image');
        $user = User::find(auth()->id());

        if ($user->hasMedia(MediaCollections::ProfilePicture->value))
            $user->getFirstMedia(MediaCollections::ProfilePicture->value)->delete();

        $user->addMediaFromBase64($blob)
            ->usingFileName('profile.picture.' . $user->id . '.png')
            ->toMediaCollection(MediaCollections::ProfilePicture->value);
    }

    /**
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

    public static function setBladeHub(): void
    {
        self::$BLADES_HUB = 'profile.';
    }

    public static function setCollection(): void
    {
        self::$COLLECTION = MediaCollections::User->value;
    }

    public function setHome(): void
    {
        self::$HOME = route('profile.edit');
    }

}
