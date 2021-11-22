<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherAccess extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
    ];

}
