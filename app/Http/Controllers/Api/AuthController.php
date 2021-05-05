<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentInfo;

class AuthController extends Controller
{
    public function signup(Request $request){
        $validatedData =   $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|unique:users',
            'class' => 'required|exists:classses,class_number',
            'section' => 'required|exists:sections,section_name',
            'roll_number' => 'required',
            'password' => 'required|min:6',
        ]);
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['role'] = 'student';

       

        $user = User::create($validatedData);



        if ($user) {
             $student['user_id']=$user->id;
             StudentInfo::create($student);

            $loginData = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            if (!auth()->attempt($loginData)) {

                return response(['success' => false, 'message' => 'Email or Password Invalied'],400);

            } else {
    
                $accessToken = auth()->user()->createToken('authToken')->accessToken;
    
                return response(['user' => auth()->user(), 'token' => $accessToken],200);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'something error'],400);
        }
    }

    public function signin(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {

            return response(['user' => null, 'message' => 'Email or Password Invalied'],400);
        } else {

            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response(['user' => auth()->user(), 'token' => $accessToken],200);
        }
    } 
    
    
public function profile_update(Request $request,$user_id){
    $user_info=User::where('id',$user_id)->where('role','student')->first();

    if (!empty($user_info)) {

        if (!empty($request->all())) {

            $user_info->update($request->all());

            $student_info=StudentInfo::where('user_id',$user_id)->first();
            $student_info->update($request->all());
            if ($request->file("image")) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $filename =  $user_id . '.' .$request->image->extension();  
                $request->image->move('profile_image/',$filename);
                $user_info->update([$user_info->image = $filename]);
            }
            return response()->json(['success' => true, 'message' => 'Successful update '], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'request data empty'], 200);
        }
    } else {
        return response()->json(['success' => false, 'message' => 'user id invalied'], 400);
    }
}




}
