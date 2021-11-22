<?php


namespace App\Http\Controllers\Api\V1;


use App\GroupsUsers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class GroupsStudentsController extends Controller
{
    public function index($id)
    {
        return User::
        join('groups_users', 'groups_users.student_id', '=', 'users.id')
            ->where('groups_users.group_id', $id)
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
        return GroupsUsers::find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = GroupsUsers::create($request->all());
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

        return GroupsUsers::findorFail($id);
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
        $course = GroupsUsers::findorFail($id);
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
        $course = GroupsUsers::findOrFail($id);
        $course->delete();
        return response()->json(['success' => true]);
    }

}


