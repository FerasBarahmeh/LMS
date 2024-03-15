<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        return view('backend/students/dashboard');
    }
}
