<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'specialization',
        'hire_date',
        'experience_year',
        'academic_degree',
        'percentage_of_course',
        'user_id',
    ];

}
