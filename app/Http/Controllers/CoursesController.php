<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;

class CoursesController extends Controller
{

    private const string BLADE_HUB = 'guests.courses.';

    /**
     * Display a listing of the resource.
     */
    public function all(): View
    {
        $courses = Course::with('category', 'setting')->paginate(2);
        return view(self::BLADE_HUB . 'index', [
            'courses' => $courses,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
