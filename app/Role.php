<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    const ADMIN_ID = 1;
    const TEACHER_ID = 2;
    const STUDENT_ID = 3;

    protected $fillable = [
        'name'
    ];
}
