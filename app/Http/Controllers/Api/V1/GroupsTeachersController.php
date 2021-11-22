<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\GroupTeacher;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class GroupsTeachersController extends Controller
{
    public function index($id)
    {
        return User::
        join('group_teachers', 'group_teachers.teacher_id', '=', 'users.id')
            ->where('group_teachers.group_id', $id)
            ->get();
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
        return GroupTeacher::find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = GroupTeacher::create($request->all());
        return $course;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return GroupTeacher::findorFail($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = GroupTeacher::findorFail($id);
        $course->update($request->all());
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = GroupTeacher::findOrFail($id);
        $course->delete();
        return response()->json(['success' => true]);
    }

}

