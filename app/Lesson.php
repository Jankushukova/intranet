<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'lesson_order',
        'course_id'
    ];
}
