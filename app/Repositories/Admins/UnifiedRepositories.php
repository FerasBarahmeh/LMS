<?php

namespace App\Repositories\Admins;

use App\Enums\Status;
use App\Enums\Theme;
use App\Http\Requests\ToggleStatusRequest;
use App\Interfaces\Repositories\Admins\DBUnifiedInterface;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;



class UnifiedRepositories implements DBUnifiedInterface
{

    /**
     * @inheritDoc
     */
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

        if($validator->fails()) {
            throw ValidationException::withMessages([
                'fail-change-theme' => 'not valid theme',
            ]);
        }

        $request->user()->theme = $request->input('theme');
        $request->user()->save();
        return Redirect::back();
    }
}
