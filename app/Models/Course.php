<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'semester',
        'description',
        'price',
        'is_free',
        'enrollment_number',
        'congratulations_message',
        'welcome_message',
        'academic_subject_id',
        'user_id',
    ];
}
