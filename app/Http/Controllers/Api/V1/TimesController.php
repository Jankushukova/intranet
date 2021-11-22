<?php

namespace App\Http\Controllers\Api\V1;

use App\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimesController extends Controller
{
    public function index()
    {
        return Time::all();
    }
}
