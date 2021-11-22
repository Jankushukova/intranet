<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'content',
        'course_id'
    ];
}
