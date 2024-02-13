<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\Admins\DBInstructorInterface;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    private DBInstructorInterface $instructor;

    public function __construct(DBInstructorInterface $instructor)
    {
        $this->instructor = $instructor;
    }

    public function index()
    {
        return $this->instructor->index();
    }
}
