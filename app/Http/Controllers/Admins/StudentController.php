<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Admins\DBStudentInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private DBStudentInterface $student;

    public function __construct(DBStudentInterface $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        return $this->student->index();
    }
}
