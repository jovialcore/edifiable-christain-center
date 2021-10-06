<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class FeedSection extends Controller
{
    public  function  index()
    {

        $post = Posts::with('user:id, username')->get();

        if (isset($post)) {
            return response()->json(['data' => $post], 200);
        } else {
            return response()->json([
                "message" => "No record feed at the moment"
            ], 404);
        }
    }

}
