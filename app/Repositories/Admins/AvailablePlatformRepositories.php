<?php

namespace App\Repositories\Admins;

use App\Http\Requests\StoreAvailablePlatformRequest;
use App\Http\Requests\UpdateAvailablePlatformRequest;
use App\Interfaces\Controllers\QuantumQuerierInterface;
use App\Interfaces\Repositories\Admins\DBAvailablePlatformInterface;
use App\Models\AvailablePlatform;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AvailablePlatformRepositories implements DBAvailablePlatformInterface, QuantumQuerierInterface
{
    use QuantumQuerier;

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        return view(self::retrieveBlade('index'), [
            'platforms' => AvailablePlatform::all(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function store(StoreAvailablePlatformRequest $request): RedirectResponse
    {
        $platform = AvailablePlatform::create($request->validated());
        if (! $platform)
            return Redirect::route('platforms.index')->with('fail-add-platform', 'Fail add media platform');

        return Redirect::route('platforms.index')->with('success-add-platform', "'Success add media {$platform->name} to valid platform");
    }

    /**
     * @inheritDoc
     */
    public function show(string $id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @inheritDoc
     */
    public function edit(string $id)
    {
        // TODO: Implement edit() method.
    }

    /**
     * @inheritDoc
     */
    public function update(UpdateAvailablePlatformRequest $request, string $id): RedirectResponse
    {
        $platform = AvailablePlatform::find($id);
        if (! $platform)
            return Redirect::route('platforms.index')->with('fail-update-platform', 'Fail update platform');

        $platform->fill($request->validated());
        $platform->save();
        return Redirect::route('platforms.index')->with('success-update-platform', 'Successfully update platform');
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id): RedirectResponse
    {
        $platform = AvailablePlatform::findOrFail($id);
        if (!$platform)
            return Redirect::route('platforms.index')->with('field-delete-platform', 'the platform not exist in our source');

        $platform->delete();
        return Redirect::route('platforms.index')->with('success-delete-platform', 'Successfully delete platform');
    }

    public static function setBladeHub(): void
    {
        self::$BLADES_HUB = 'backend.admins.platforms.';
    }

    public static function setCollection(): void
    {
        self::$COLLECTION = '';
    }
}
