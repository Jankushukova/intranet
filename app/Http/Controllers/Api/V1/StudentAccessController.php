<?php

namespace App\Http\Controllers\Api\V1;

use App\Course;
use App\Role;
use App\StudentAccess;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentAccessController extends Controller
{
    public function getAllUserAccessesFromCourse($course_id)
    {
        $users = User::select('users.*')->join('student_accesses', function ($join) {
            $join->on('student_accesses.user_id', 'users.id');
            $join->on('users.role_id', '=', DB::raw(Role::STUDENT_ID));
        })
            ->where('student_accesses.course_id', $course_id)
            ->get();
        return $users;
    }



    public function getMyAvailableCourses($user_id)
    {
        $courses = Course::select('courses.*')->join('student_accesses', 'courses.id', '=', 'student_accesses.course_id')
            ->where('student_accesses.user_id', $user_id)
            ->get();
        return $courses;
    }


    public function getNotRegisteredUsersOfCourse($course_id)
    {
        $userIds = User::select('users.id')->join('student_accesses', function ($join) {
            $join->on('student_accesses.user_id', 'users.id');
            $join->on('users.role_id', '=', DB::raw(Role::STUDENT_ID));
        })
            ->where('student_accesses.course_id', $course_id)
            ->get()->toArray();

        $users = User::whereNotIn('id', $userIds)->where('role_id', Role::STUDENT_ID)->get();
        return $users;
    }


    public function saveAll(Request $request)
    {
        $data = $request->all();


        $validator = Validator::make($data, [
            'user_ids' => 'array',
            'course_id' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $course_id = $data['course_id'];
        if ($request->user_ids) {
            $user_ids = $data['user_ids'];
        } else {
            $user_ids = [];
        }

        $selectedUsers = User::whereIn('id', $user_ids)->get();
        $courseUsers = User::select('users.*')->join('student_accesses', function ($join) {
            $join->on('student_accesses.user_id', 'users.id');
            $join->on('users.role_id', '=', DB::raw(Role::STUDENT_ID));
        })
            ->where('student_accesses.course_id', $course_id)
            ->get();
        $spareUsers = $courseUsers->diff($selectedUsers);
        $newUsers = $selectedUsers->diff($courseUsers);

        $spareUsersIds = [];
        foreach ($spareUsers as $spareUser) {
            $spareUsersIds[] = $spareUser->id;
        }

        $newUsersIds = [];
        foreach ($newUsers as $newUser) {
            $newUsersIds[] = $newUser->id;
        }

        StudentAccess::whereIn('user_id', $spareUsersIds)->where('course_id', $course_id)->delete();
        foreach ($newUsersIds as $newUsersId) {
            StudentAccess::create([
                'user_id' => $newUsersId,
                'course_id' => $course_id,
            ]);
        }
        return response()->json('success', 201);
    }

}
