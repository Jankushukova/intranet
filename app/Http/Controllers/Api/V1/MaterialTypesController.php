<?php

namespace App\Http\Controllers\Api\V1;

use App\MaterialType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialTypesController extends Controller
{
    public function index(){
        return MaterialType::all();
    }
}
