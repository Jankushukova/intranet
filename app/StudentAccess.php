<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAccess extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
    ];
}
