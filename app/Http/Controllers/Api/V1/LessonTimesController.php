<?php

namespace App\Http\Controllers\Api\V1;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonTimesController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'course_ids' => 'array',
            'user_id' => 'required|numeric',
        ]);
    }
}
