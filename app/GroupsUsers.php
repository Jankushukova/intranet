<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupsUsers extends Model
{
    protected $fillable = [
        'student_id',
        'group_id'
    ];
}
