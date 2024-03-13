<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\StoreCourseRequest;
use App\Http\Requests\DeleteLectureRequest;
use App\Http\Requests\DeleteSectionRequest;
use App\Interfaces\Repositories\DB\Instructor\CoursesInterface;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    private CoursesInterface $courses;

    public function __construct(CoursesInterface $courses)
    {
        $this->courses = $courses;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->courses->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        return $this->courses->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->courses->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->courses->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->courses->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->courses->destroy($id);
    }

    /*
     * Show curriculum forms for specific course
     */
    public function curriculum(string $id)
    {
        return $this->courses->curriculum($id);
    }

    /*
     * Show settings forms for specific course
     */
    public function settings(string $id)
    {
        return $this->courses->settings($id);
    }

    /**
     * Delete section
     */
    public function deleteSection(DeleteSectionRequest $request, $id)
    {
        return $this->courses->deleteSection($request, $id);
    }

    /**
     * Delete Lecture
     */
    public function deleteLecture(DeleteLectureRequest $request, $id)
    {
        return $this->courses->deleteLecture($request, $id);
    }
}
