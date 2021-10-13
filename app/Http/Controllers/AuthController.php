<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //check if validation fails

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        //this is so far the shortest, lean and elegant way I have come accors for getting all input, make some transformatiosn, especailly pasword and then you save to db
        $dataInput = $request->all();
        $dataInput['password'] = bcrypt($dataInput['password']);
        $user = User::create($dataInput);

        return response()->json([
            'token' => $user->createToken('edifyToken')->plainTextToken
        ]);
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);
        if (!Auth::attempt($credentials)) {
            return response()->json(['Incorrect Email or Password'], 401);
        }

        return response()->json([
            'token' => Auth::user()->createToken('edifyAuthToken')->plainTextToken,
            'user' => Auth::user()
        ]);
    }
}
