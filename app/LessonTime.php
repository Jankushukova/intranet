<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonTime extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'schedule_id',
        'week_day_id',
        'start_time_id',
        'end_time_id'
    ];
}
