<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description',
        'title',
        'ready'
    ];
}
