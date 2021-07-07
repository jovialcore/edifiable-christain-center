<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class FeedSection extends Controller
{
    public  function  index()
    {
        $post =  Posts::get(['id', 'title', 'text', 'created_at'])->toArray();
        $poster = Posts::first('user_id');

        dd($poster->user_id);

        if (isset($post)) {
            return response()->json(["data" => $post, 'poster' => 'f' ], 200);
        } else {
            return response()->json([
                "message" => "No record feed at the moment"
            ], 404);
        }
    }
}
