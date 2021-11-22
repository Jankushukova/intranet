<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return User::all();
    }


    public function getTeachers()
    {
        return User::where('role_id', Role::TEACHER_ID)->get();
    }

    public function getStudents()
    {
        return User::where('role_id', Role::STUDENT_ID)->get();
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

    public function getCurrent()
    {
        return Auth::user();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::create($request->all());
        $user->password = bcrypt($user->password);;
        $user->save();
        return $user;
    }

    public function editPersonalData(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'role_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $userToUpdate = User::findOrFail($id);
        $currentUser = Auth::user();
        if ($currentUser->isAdmin() || $currentUser->id === $userToUpdate->id) {
            $userToUpdate->first_name = $data['first_name'];
            $userToUpdate->last_name = $data['last_name'];
            $userToUpdate->phone_number = $data['phone_number'];
            $userToUpdate->role_id = $data['role_id'];
            $userToUpdate->save();
            return response()->json(['success' => true], 200);
        } else {
            return response()->json($validator->errors(), 403);
        }
    }


    public function changePassword(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'password' => ['required', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $userToUpdate = User::findOrFail($id);
        $currentUser = Auth::user();
        if ($currentUser->isAdmin() || $currentUser->id === $userToUpdate->id) {
            $userToUpdate->password = bcrypt($data['password']);
            $userToUpdate->save();
            return response()->json(['success' => true], 200);
        } else {
            return response()->json($validator->errors(), 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return User::findorFail($id);
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
        $course = User::findorFail($id);
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
        $course = User::findOrFail($id);
        $course->delete();
        return response()->json(['success' => true]);
    }

}
