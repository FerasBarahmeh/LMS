<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courses\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\AcademicSubject;
use App\Models\Course;
use App\Traits\Controllers\FlashMessages;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{
    use FlashMessages;

    private const string BLADE_HUB = 'backend.instructors.courses.';

    private Collection $academicSubjects;

    public function __construct()
    {
        $this->academicSubjects = AcademicSubject::all();
        $this->messages = [
            'create-course-success' => 'successfully created course now manage this course to publish it',
            'update-course-success' => 'successfully update course',
            'failed-course-success' => 'failed update course',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = Course::with('user', 'sections')->paginate(6);
        return view(self::BLADE_HUB . 'index', [
            'academicSubjects' => $this->academicSubjects,
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $course = Course::create($request->validated());
        return Redirect::route('instructor.courses.manage.curriculum', $course->id)
            ->with('create-course-success', $this->getMessage('create-course-success'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO: Implement show() method
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $course = Course::find($id);

        return view(self::BLADE_HUB . 'edit', [
            'course' => $course,
            'subjects' => $this->academicSubjects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, string $id): RedirectResponse
    {
        $course = Course::find($id);
        $course->update($request->validated());
        if ($course->save())
            return $this->backWith('update-course-success');
        return $this->backWith('failed-course-success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TODO: Implement destroy() method
    }

    /*
     * Show curriculum forms for specific course
     */
    public function curriculum(string $id): View
    {
        $course = Course::with('sections')->find($id);

        return view(self::BLADE_HUB . 'curriculum', [
            'course' => $course,
        ]);
    }

    /*
     * Show settings forms for specific course
     */
    public function settings(string $id): View
    {
        $course = Course::with('sections')->find($id);

        return view(self::BLADE_HUB . 'settings', [
            'course' => $course,
        ]);
    }
}
