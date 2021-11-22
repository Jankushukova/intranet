<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'lesson_id',
        'material_order',
        'material_type_id'
    ];
}
