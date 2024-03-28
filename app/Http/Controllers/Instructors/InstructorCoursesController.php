<?php

namespace App\Http\Controllers\Instructors;

use App\Actions\Courses\StoreCourse;
use App\Actions\Courses\UpdateAttributesDependingOnPublishStatus;
use App\Enums\MediaCollections;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseMessagesRequest;
use App\Http\Requests\CoursePriceRequest;
use App\Http\Requests\Courses\StoreCourseRequest;
use App\Http\Requests\UpdateCourseImageRequest;
use App\Http\Requests\UpdateCoursePromotionalRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\AcademicSubject;
use App\Models\Course;
use App\Traits\Controllers\FlashMessages;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class InstructorCoursesController extends Controller
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
            'update-course-image-success' => 'Success update image course',
            'update-course-promotional-success' => 'Success update course promotional course',
            'success-publish-course' => 'Publish course successfully',
            'failed-publish-course' => 'Failed publish course must has some some content missed',
            'success-update-welcome-message' => 'Updated welcome message successfully',
            'success-update-price' => 'Price course updated  successes',
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
        $course = StoreCourse::execute($request->validated());
        return Redirect::route('instructor.courses.manage.curriculum', $course->id)
            ->with('create-course-success', $this->getMessage('create-course-success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $course = Course::findOrFail($id);

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
        $course = Course::findOrFail($id);
        $course->update($request->validated());
        return $course->save()
            ? $this->backWith('update-course-success')
            : $this->backWith('failed-course-success');
    }

    /*
     * Show curriculum forms for specific course
     */
    public function curriculum(string $id): View
    {
        $course = Course::with('sections')->findOrFail($id);

        return view(self::BLADE_HUB . 'curriculum', [
            'course' => $course,
        ]);
    }

    /*
     * Show settings forms for specific course
     */
    public function settings(string $id): View
    {
        $course = Course::with('sections')->findOrFail($id);

        return view(self::BLADE_HUB . 'settings', [
            'course' => $course,
        ]);
    }

    public function messages($id): View
    {
        $course = Course::findOrFail($id);
        return view(self::BLADE_HUB . 'messages', [
            'course' => $course,
        ]);
    }

    public function updateImage(UpdateCourseImageRequest $request, $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $service = $course->service();
        $service->clearImage();
        $service->updateImageFromRequest('course_image');
        UpdateAttributesDependingOnPublishStatus::execute($course);
        return $this->backWith('update-course-image-success');
    }

    public function updatePromotional(UpdateCoursePromotionalRequest $request, $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $service = $course->service();
        $service->clearPromotional();
        $service->updatePromotionalFromRequest('course_promotional');
        UpdateAttributesDependingOnPublishStatus::execute($course);
        return $this->backWith('update-course-promotional-success');
    }

    public function publish(string $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $published = $course->service()->dispatchPublished();
        return $published
            ? $this->backWith('success-publish-course')
            : $this->backWith('failed-publish-course');
    }

    public function updateMessages(CourseMessagesRequest $request, $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $course->update($request->validated());
        $course->save();

        return $this->backWith('success-update-welcome-message');
    }

    public function updatePrice(CoursePriceRequest $request, $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $course->update($request->validated());
        $course->save();
        return $this->backWith('success-update-price');
    }

    public function all()
    {
        $courses = Course::paginate(5);

    }
}
