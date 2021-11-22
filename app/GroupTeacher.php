<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupTeacher extends Model
{
    protected $fillable = [
        'teacher_id',
        'group_id'
    ];
}
