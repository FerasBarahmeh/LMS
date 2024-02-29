<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\DB\Admins\StudentInterface;

class StudentController extends Controller
{
    private StudentInterface $student;

    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return $this->student->index();
    }
}
