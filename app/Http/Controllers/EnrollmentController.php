<?php

namespace App\Http\Controllers;

use App\Actions\Courses\EnrollmentToCourseForFreeAction;
use App\Models\Course;
use Exception;
use Illuminate\Http\RedirectResponse;

class EnrollmentController extends Controller
{
    /**
     * @throws Exception
     */
    public function enroll($course): RedirectResponse
    {
        if (!user()->service()->isEnrolled($course)) {
            $course = Course::findOrFail($course);
            EnrollmentToCourseForFreeAction::execute($course);
            return redirect()->route('course')->with('success-enroll', 'You are enrolled now.');
        }

        return redirect()->back()->with('fail-enroll', 'You already enrolled in this course.');
    }
}
