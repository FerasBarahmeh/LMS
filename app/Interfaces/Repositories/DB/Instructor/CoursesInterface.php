<?php

namespace App\Interfaces\Repositories\DB\Instructor;

use App\Http\Requests\Courses\StoreCourseRequest;
use App\Http\Requests\DeleteSectionRequest;
use Illuminate\Http\Request;

interface CoursesInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index();

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request);

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
    public function update(Request $request, string $id);

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id);

    /*
     * Show curriculum forms for specific course
     */
    public function curriculum(string $id);

    /*
     * Show settings forms for specific course
     */
    public function settings(string $id);

    /**
     * Delete section
     */
    public function deleteSection(DeleteSectionRequest $request, $id);
}
