<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id',
        'lesson_id',
        'access_id',
        'grade'
    ];
}
