<?php

namespace App\Interfaces\Repositories\Admins;

use App\Http\Requests\StoreAvailablePlatformRequest;
use App\Http\Requests\UpdateAvailablePlatformRequest;
use Illuminate\Contracts\View\View;

interface DBSocialMediaAccountInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View;

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAvailablePlatformRequest $request);

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAvailablePlatformRequest $request, string $id);

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id);
}
