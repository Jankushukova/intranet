<?php

namespace App\Http\Controllers\Api\V1;

use App\Course;
use App\TeacherAccess;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherAccessController extends Controller
{
    public function getMyAvailableCourses($user_id)
    {
        $courses = Course::select('courses.*')->join('teacher_accesses', 'courses.id', '=', 'teacher_accesses.course_id')
            ->where('teacher_accesses.user_id', $user_id)
            ->get();
        return $courses;
    }

    public function getMyNotAvailableCourses($user_id)
    {
        $teacherAccesses = TeacherAccess::where('user_id', $user_id)->get();
        $ids = [];
        foreach ($teacherAccesses as $teacherAccess) {
            $ids[] = $teacherAccess->course_id;
        }
        $courses = Course::whereNotIn('id', $ids)->get();
        return $courses;
    }


    public function saveAll(Request $request)
    {
        $data = $request->all();


        $validator = Validator::make($data, [
            'course_ids' => 'array',
            'user_id' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user_id = $data['user_id'];
        if ($request->course_ids) {
            $course_ids = $data['course_ids'];
        } else {
            $course_ids = [];
        }

        $selectedCourses = Course::whereIn('id', $course_ids)->get();
        $userCourses = Course::select('courses.*')->join('teacher_accesses', 'courses.id', '=', 'teacher_accesses.course_id')
            ->where('teacher_accesses.user_id', $user_id)
            ->get();

        $spareCourses = $userCourses->diff($selectedCourses);
        $newCourses = $selectedCourses->diff($userCourses);

        $spareCoursesIds = [];
        foreach ($spareCourses as $spareCourse) {
            $spareCoursesIds[] = $spareCourse->id;
        }

        $newCoursesIds = [];
        foreach ($newCourses as $newCourse) {
            $newCoursesIds[] = $newCourse->id;
        }

        TeacherAccess::whereIn('course_id', $spareCoursesIds)->where('user_id', $user_id)->delete();

        foreach ($newCoursesIds as $newCoursesId) {
            TeacherAccess::create([
                'user_id' => $user_id,
                'course_id' => $newCoursesId,
            ]);
        }
        return response()->json('success', 201);
    }
}
