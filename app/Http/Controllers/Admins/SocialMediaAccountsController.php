<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAvailablePlatformRequest;
use App\Http\Requests\UpdateAvailablePlatformRequest;
use App\Models\Icon;
use App\Models\SocialMediaAccount;
use App\Traits\Controllers\FlashMessages;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SocialMediaAccountsController extends Controller
{
    use FlashMessages;

    private const string BLADE_HUB = 'backend.admins.platforms.';

    public function __construct()
    {
        $this->messages = [
            'success-add-platform' => 'Success add media :params to valid platform',
            'fail-add-platform' => 'Fail add media platform',
            'fail-update-platform', 'Fail update platform',
            'success-update-platform' => 'Successfully update platform',
            'field-delete-platform' => 'the platform not exist in our source',
            'success-delete-platform' => 'Successfully delete platform',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view(self::BLADE_HUB . 'index', [
            'platforms' => SocialMediaAccount::with('icon')->get(),
            'icons' => Icon::all('id', 'name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAvailablePlatformRequest $request)
    {
        $platform = SocialMediaAccount::create($request->validated());

        if (!$platform)
            return $this->backWith('fail-add-platform');

        return $this->backWith('success-add-platform', $platform->name);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAvailablePlatformRequest $request, string $id): RedirectResponse
    {
        $platform = SocialMediaAccount::find($id);

        if (!$platform)
            $this->backWith('fail-update-platform',);

        $platform->fill($request->validated());
        $platform->save();

        return $this->backWith('success-update-platform');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $platform = SocialMediaAccount::findOrFail($id);

        if (!$platform)
            return $this->backWith('field-delete-platform');

        $platform->delete();

        return $this->backWith('success-delete-platform');
    }
}
