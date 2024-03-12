<?php

namespace App\Repositories\Instructors;

use App\Http\Requests\Courses\StoreCourseRequest;
use App\Http\Requests\DeleteSectionRequest;
use App\Interfaces\Repositories\DB\Instructor\CoursesInterface;
use App\Models\AcademicSubject;
use App\Models\Course;
use App\Models\CourseSection;
use App\Traits\Controllers\QuantumQuerier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CoursesRepositories implements CoursesInterface
{
    use QuantumQuerier;

    /**
     * @inheritDoc
     */
    public function index(): View
    {
        $courses = Course::with('user', 'sections')->paginate(6);
        return view(self::retrieveBlade('index'), [
            'academicSubjects' => AcademicSubject::all(),
            'courses' => $courses,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $course = Course::create($request->validated());
        return Redirect::route('instructor.courses.manage.curriculum', $course->id)->with('create-course-success', 'successfully created course now manage this course to publish it');
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
    public function update(Request $request, string $id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function destroy(string $id)
    {
        //TODO: Implement destroy() method
    }

    public function curriculum(string $id): View
    {
        $course = Course::with('sections')->find($id);
        return view(self::retrieveBlade('curriculum'), [
            'course' => $course,
        ]);
    }

    public function deleteSection(DeleteSectionRequest $request, $id): RedirectResponse
    {
        CourseSection::find($id)->delete();
        return \redirect()->back()->with('delete-section-success', 'Success delete section for this course');
    }

    public function settings(string $id): View
    {
        $course = Course::with('sections')->find($id);
        return view(self::retrieveBlade('settings'), [
            'course' => $course,
        ]);
    }

    public static function setBladeHub(): void
    {
        self::$BLADES_HUB = 'backend.instructors.courses.';
    }
}
