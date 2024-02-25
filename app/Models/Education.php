<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'education_name',
        'organization_name',
        'start_date',
        'finish_date',
        'description',
        'user_id',
    ];

}
