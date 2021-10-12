<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup(Request $request)
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

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
    }
}
