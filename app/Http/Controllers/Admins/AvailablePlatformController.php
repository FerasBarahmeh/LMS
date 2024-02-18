<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAvailablePlatformRequest;
use App\Http\Requests\UpdateAvailablePlatformRequest;
use App\Interfaces\Repositories\Admins\DBAvailablePlatformInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AvailablePlatformController extends Controller
{
    private DBAvailablePlatformInterface $availablePlatform;
    public function __construct(DBAvailablePlatformInterface $availablePlatform)
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAvailablePlatformRequest $request)
    {
        return $this->availablePlatform->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
