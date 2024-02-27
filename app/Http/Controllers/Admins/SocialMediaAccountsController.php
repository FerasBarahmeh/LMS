<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAvailablePlatformRequest;
use App\Http\Requests\UpdateAvailablePlatformRequest;
use App\Interfaces\Repositories\Admins\DBSocialMediaAccountInterface;
use Illuminate\Contracts\View\View;

class SocialMediaAccountsController extends Controller
{
    private DBSocialMediaAccountInterface $availablePlatform;

    public function __construct(DBSocialMediaAccountInterface $availablePlatform)
    {
        $this->availablePlatform = $availablePlatform;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return $this->availablePlatform->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAvailablePlatformRequest $request)
    {
        return $this->availablePlatform->store($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAvailablePlatformRequest $request, string $id)
    {
        return $this->availablePlatform->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->availablePlatform->destroy($id);
    }
}
