<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAvailablePlatformRequest;
use App\Http\Requests\UpdateAvailablePlatformRequest;
use App\Models\Icon;
use App\Models\SocialMediaAccount;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SocialMediaAccountsController extends Controller
{
    use QuantumQuerier;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view(self::retrieveBlade('index'), [
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
            return self::toHome('fail-add-platform', 'Fail add media platform');

        return self::toHome(
            'success-add-platform',
            "Success add media {$platform->name} to valid platform"
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAvailablePlatformRequest $request, string $id): RedirectResponse
    {
        $platform = SocialMediaAccount::find($id);
        if (!$platform)
            return self::toHome('fail-update-platform', 'Fail update platform');

        $platform->fill($request->validated());
        $platform->save();
        return self::toHome('success-update-platform', 'Successfully update platform');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $platform = SocialMediaAccount::findOrFail($id);
        if (!$platform)
            return self::toHome('field-delete-platform', 'the platform not exist in our source');

        $platform->delete();
        return self::toHome('success-delete-platform', 'Successfully delete platform');
    }

    public static function setBladeHub(): void
    {
        self::$BLADES_HUB = 'backend.admins.platforms.';
    }

    public static function setCollection(): void
    {
        self::$COLLECTION = '';
    }

    public static function setHome(): void
    {
        self::$HOME = route('admin.platforms.index');
    }
}
