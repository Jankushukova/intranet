<?php


namespace App\Http\Controllers\Api\V1;


use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function index($id)
    {
        return Lesson::where('course_id', $id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function specific($id)
    {
        return Lesson::find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Lesson::create($request->all());
        return $course;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return Lesson::findorFail($id);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "update";
        $course = Lesson::findorFail($id);
        $course->update($request->all());
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Lesson::findOrFail($id);
        $course->delete();
        return response()->json(['success' => true]);
    }

}
