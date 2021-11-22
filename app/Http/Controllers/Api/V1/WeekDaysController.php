<?php

namespace App\Http\Controllers\Api\V1;

use App\WeekDay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeekDaysController extends Controller
{
    public function index()
    {
        return WeekDay::all();
    }
}
