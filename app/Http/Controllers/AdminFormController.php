<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class AdminFormController extends Controller
{
    public function store(Request $req)
    {
        if ($req->has('name') && $req->has('title') && $req->has('text') && $req->has('email') && $req->has('username')) {

            $validate = Validator::make(
                $req->all(),
                [
                    'name' => 'required',
                    'title' => 'required',
                    'text' => 'required',
                    'email' => 'required',
                    'username' => 'required'

                ],
                [
                    'name.required' => 'Name is required',
                    'text.required' => 'Text field is empty',
                    'title.required' => 'Title field is required',
                    'email.required' => 'Email field is required',
                    'username.required' => 'Username field is required',

                ]
            );
            if ($validate->fails()) {
                return response()->json($validate->messages());
            }

            //save the poster
            $user = new User();
            if (!$user->email === $req->email) {
                User::create([
                    'name' => $req->name,
                    'email' => $req->email,
                    'username' => $req->username
                ]);
            }

            if (!$req->username == null ) {
                $user_id = User::where('username', $req->username)->first()->id;
            }
            //save the entire posts
            Posts::updateOrcreate([
                'title' => $req->title,
                'text' => $req->text,
                'user_id' => $user_id
            ]);
            return response()->json(['success' => 'Edifie posted successfully !!!'], 201);
        } else {
            return response()->json(['error' => 'There was an error in submission. Please try again']);
        }
    }
}
