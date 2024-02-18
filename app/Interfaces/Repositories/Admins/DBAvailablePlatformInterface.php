<?php

namespace App\Interfaces\Repositories\Admins;

use App\Http\Requests\StoreAvailablePlatformRequest;
use App\Http\Requests\UpdateAvailablePlatformRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

interface DBAvailablePlatformInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View;
    /**
     * Show the form for creating a new resource.
     */
    public function create();
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAvailablePlatformRequest $request);
    /**
     * Display the specified resource.
     */
    public function show(string $id);
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id);
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAvailablePlatformRequest $request, string $id);
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id);
}
