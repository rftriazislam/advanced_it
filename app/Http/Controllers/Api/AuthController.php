<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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

       

        $user = User::create($validatedData);
        if ($user) {
            return response()->json(['sucsess' => true, 'message' => 'Information save successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'something error']);
        }
    }

    public function signin(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {

            return response(['user' => null, 'message' => 'Email or Password Invalied']);
        } else {

            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response(['user' => auth()->user(), 'token' => $accessToken]);
        }
    }  
}
