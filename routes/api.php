<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:web')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'auth:web',
    'prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

    //users
    Route::get('/users/current', ['uses' => 'UsersController@getCurrent', 'as' => 'users.current']);

    //StudentAccess
    Route::get('student/access/users/{user_id}', ['uses' => 'StudentAccessController@getMyAvailableCourses', 'as' => 'student.access.user.index'])->where('course_id', '[0-9]+');
    Route::get('student/access/courses/{course_id}', ['uses' => 'StudentAccessController@getAllUserAccessesFromCourse', 'as' => 'student.access.index'])->where('course_id', '[0-9]+');
    Route::get('student/access/except/courses/{course_id}', ['uses' => 'StudentAccessController@getNotRegisteredUsersOfCourse', 'as' => 'student.access.index'])->where('course_id', '[0-9]+');

    //TeacherAccess
    Route::get('teacher/access/except/courses/{user_id}', ['uses' => 'TeacherAccessController@getMyNotAvailableCourses', 'as' => 'teacher.access.index'])->where('user_id', '[0-9]+');
    Route::get('teacher/access/courses/{user_id}', ['uses' => 'TeacherAccessController@getMyAvailableCourses', 'as' => 'teacher.access.index'])->where('user_id', '[0-9]+');

    //Lessons
    Route::get('/lessons/{id}', ['uses' => 'LessonsController@index', 'as' => 'lessons.index'])->where('id', '[0-9]+');
    Route::get('/lessonsShow/{id}', ['uses' => 'LessonsController@show', 'as' => 'lessons.show'])->where('id', '[0-9]+');


    //Materials
    Route::get('/materials/{lesson_id}', ['uses' => 'MaterialsController@index', 'as' => 'materials.index'])->where('id', '[0-9]+');
    Route::get('/materialsShow/{lesson_id}', ['uses' => 'MaterialsController@show', 'as' => 'materials.show'])->where('id', '[0-9]+');

    //Groups
    Route::get('groups', ['uses' => 'GroupsController@index', 'as' => 'groups.index']);

    //GroupsTeachers
    Route::get('/groupsTeachers/{id}', ['uses' => 'GroupsTeachersController@index', 'as' => 'groupsTeachers.index'])->where('id', '[0-9]+');


    //GroupsStudents
    Route::get('/groupsStudents/{id}', ['uses' => 'GroupsStudentsController@index', 'as' => 'groupsStudents.index'])->where('id', '[0-9]+');

    //Times
    Route::get('/times', ['uses' => 'TimesController@index', 'as' => 'times.index']);

    //WeekDays
    Route::get('/weekDays', ['uses' => 'WeekDaysController@index', 'as' => 'weekDay.index']);


    Route::group(['middleware' => 'admin'], function () {

        //courses
        Route::get('/courses', ['uses' => 'CoursesController@index', 'as' => 'courses.index']);
        Route::post('courses', ['uses' => 'CoursesController@store', 'as' => 'courses.store']);
        Route::get('courses/{id}', ['uses' => 'CoursesController@show', 'as' => 'courses.show'])->where('id', '[0-9]+');
        Route::delete('courses/{id}', ['uses' => 'CoursesController@destroy', 'as' => 'courses.destroy'])->where('id', '[0-9]+');
        Route::put('courses/{id}', ['uses' => 'CoursesController@update', 'as' => 'courses.update.put'])->where('id', '[0-9]+');
        Route::patch('courses/{id}', ['uses' => 'CoursesController@update', 'as' => 'courses.update.patch'])->where('id', '[0-9]+');


        //lessons
        Route::post('lessons', ['uses' => 'LessonsController@store', 'as' => 'lessons.store']);
        Route::delete('lessons/{id}', ['uses' => 'LessonsController@destroy', 'as' => 'lessons.destroy'])->where('id', '[0-9]+');
        Route::put('lessons/{id}', ['uses' => 'LessonsController@update', 'as' => 'lessons.update.put'])->where('id', '[0-9]+');
        Route::patch('lessons/{id}', ['uses' => 'LessonsController@update', 'as' => 'lessons.update.patch'])->where('id', '[0-9]+');


        Route::get('material_types', ['uses' => 'MaterialTypesController@index', 'as' => 'material_types.index']);

        //materials
        Route::post('materials', ['uses' => 'MaterialsController@store', 'as' => 'materials.store']);
        Route::delete('materials/{id}', ['uses' => 'MaterialsController@destroy', 'as' => 'materials.destroy'])->where('id', '[0-9]+');
        Route::put('materials/{id}', ['uses' => 'MaterialsController@update', 'as' => 'materials.update.put'])->where('id', '[0-9]+');
        Route::patch('materials/{id}', ['uses' => 'MaterialsController@update', 'as' => 'materials.update.patch'])->where('id', '[0-9]+');


        //users
        Route::get('/users/teachers', ['uses' => 'UsersController@getTeachers', 'as' => 'users.teachers']);
        Route::get('/users/students', ['uses' => 'UsersController@getStudents', 'as' => 'users.students']);
        Route::get('users', ['uses' => 'UsersController@index', 'as' => 'users.index']);
        Route::post('users', ['uses' => 'UsersController@store', 'as' => 'users.store']);
        Route::get('users/{id}', ['uses' => 'UsersController@show', 'as' => 'users.show'])->where('id', '[0-9]+');
        Route::delete('users/{id}', ['uses' => 'UsersController@destroy', 'as' => 'users.destroy'])->where('id', '[0-9]+');
        Route::put('users/{id}', ['uses' => 'UsersController@update', 'as' => 'users.update.put'])->where('id', '[0-9]+');
        Route::patch('users/{id}', ['uses' => 'UsersController@update', 'as' => 'users.update.patch'])->where('id', '[0-9]+');

        Route::put('users/profile/{id}', ['uses' => 'UsersController@editPersonalData', 'as' => 'users.update.personal.put'])->where('id', '[0-9]+');
        Route::patch('users/profile/{id}', ['uses' => 'UsersController@editPersonalData', 'as' => 'users.update.personal.patch'])->where('id', '[0-9]+');

        Route::put('users/password/{id}', ['uses' => 'UsersController@changePassword', 'as' => 'users.update.password.put'])->where('id', '[0-9]+');
        Route::patch('users/password/{id}', ['uses' => 'UsersController@changePassword', 'as' => 'users.update.password.patch'])->where('id', '[0-9]+');


        //groups
        Route::get('groups', ['uses' => 'GroupsController@index', 'as' => 'groups.index']);
        Route::post('groups', ['uses' => 'GroupsController@store', 'as' => 'groups.store']);
        Route::get('groups/{id}', ['uses' => 'GroupsController@show', 'as' => 'groups.show'])->where('id', '[0-9]+');
        Route::delete('groups/{id}', ['uses' => 'GroupsController@destroy', 'as' => 'groups.destroy'])->where('id', '[0-9]+');
        Route::put('groups/{id}', ['uses' => 'GroupsController@update', 'as' => 'groups.update.put'])->where('id', '[0-9]+');
        Route::patch('groups/{id}', ['uses' => 'GroupsController@update', 'as' => 'groups.update.patch'])->where('id', '[0-9]+');

        //groupsTeachers
        Route::get('groupsTeachers/{id}', ['uses' => 'GroupsTeachersController@index', 'as' => 'groupsTeachers.index'])->where('id', '[0-9]+');
        Route::post('groupsTeachers', ['uses' => 'GroupsTeachersController@store', 'as' => 'groupsTeachers.store']);
        Route::delete('groupsTeachers/{id}', ['uses' => 'GroupsTeachersController@destroy', 'as' => 'groupsTeachers.destroy'])->where('id', '[0-9]+');
        Route::put('groupsTeachers/{id}', ['uses' => 'GroupsTeachersController@update', 'as' => 'groupsTeachers.update.put'])->where('id', '[0-9]+');
        Route::patch('groupsTeachers/{id}', ['uses' => 'GroupsTeachersController@update', 'as' => 'groupsTeachers.update.patch'])->where('id', '[0-9]+');

        //groupsStudents
        Route::get('groupsStudents/{id}', ['uses' => 'GroupsStudentsController@index', 'as' => 'groupsStudents.index'])->where('id', '[0-9]+');
        Route::post('groupsStudents', ['uses' => 'GroupsStudentsController@store', 'as' => 'groupsStudents.store']);
        Route::delete('groupsStudents/{id}', ['uses' => 'GroupsStudentsController@destroy', 'as' => 'groupsStudents.destroy'])->where('id', '[0-9]+');
        Route::put('groupsStudents/{id}', ['uses' => 'GroupsStudentsController@update', 'as' => 'groupsStudents.update.put'])->where('id', '[0-9]+');
        Route::patch('groupsStudents/{id}', ['uses' => 'GroupsStudentsController@update', 'as' => 'groupsStudents.update.patch'])->where('id', '[0-9]+');

        //TeacherAccesses
        Route::post('teacher/access/courses/save', ['uses' => 'TeacherAccessController@saveAll', 'as' => 'teacher.access.store']);

        //StudentAccesses
        Route::post('student/access/courses/save', ['uses' => 'StudentAccessController@saveAll', 'as' => 'student.access.store']);

    });

});

