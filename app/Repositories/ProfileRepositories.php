<?php

namespace App\Repositories;

use App\Enums\MediaCollections;
use App\Enums\Status;
use App\Enums\Theme;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ToggleStatusRequest;
use App\Interfaces\Controllers\QuantumQuerierInterface;
use App\Interfaces\Repositories\Admins\DBProfileInterface;
use App\Models\AvailablePlatform;
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

class ProfileRepositories implements DBProfileInterface, QuantumQuerierInterface
{
    use QuantumQuerier;

    /**
     * @inheritDoc
     */
    public function index(Request $request): View
    {
        return view(self::retrieveBlade('index'), [
            'user' => $request->user(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function edit(Request $request): View
    {
        return view(self::retrieveBlade('edit'), [
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

        if (!$saved)
            return Redirect::route('profile.edit')->with('profile-update-fail', 'Fail  Updated Profile');

        return Redirect::route('profile.edit')->with('profile-update-successfully', 'Profile Updated Successfully');
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

    public function changeProfilePicture(Request $request): void
    {
        $blob = $request->json('image');
        $user = User::find(auth()->id());

        if ($user->hasMedia(self::$COLLECTION))
            $user->getFirstMedia(self::$COLLECTION)->delete();

        $user->addMediaFromBase64($blob)
            ->usingFileName('profile-picture-' . $user->id . '.png')
            ->toMediaCollection(self::$COLLECTION);
    }

    public function toggleStatus(ToggleStatusRequest $request, string $id): RedirectResponse
    {
        $request->validated();

        $instructor = User::find($id);

        $instructor->status = $instructor->status == Status::InActive->value ? Status::Active->value : Status::InActive->value;

        if ($instructor->save()) {
            return Redirect::back()->with('change-status-success', "Status update: The status for instructor {$instructor->name} has been successfully modified.");
        }

        return Redirect::back()->with('change-status-fail', "Failed to update status for instructor {$instructor->name}. Please check and try again.");

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
        self::$COLLECTION = MediaCollections::Users->value;
    }

}
