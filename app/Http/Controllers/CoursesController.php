<?php

namespace App\Http\Controllers;

use App\Models\AcademicSubject;
use App\Models\Course;
use App\Services\Models\CourseService;
use Illuminate\Contracts\View\View;

class CoursesController extends Controller
{

    private const string BLADE_HUB = 'guests.courses.';

    /**
     * Display a listing of the resource.
     */
    public function all(): View
    {
        return view(self::BLADE_HUB . 'index', [
            'courses' => CourseService::publishedCoursesWith('category', 'setting', 'media')->paginate(9),
            'recentCourses' => Course::with('media', 'setting', 'setting.publishStatus')->latest()->take(2)->get(),
            'categories' => AcademicSubject::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $course = CourseService::publishedCourse()->findOrFail($id);
        return view(self::BLADE_HUB . 'course', [
            'course' => $course,
        ]);
    }
}
