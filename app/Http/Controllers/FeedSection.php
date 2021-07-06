<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class FeedSection extends Controller
{
    public  function  index()
    {
        $post =  Posts::get()->toArray();

        if (isset($post)) {
            return response()->json(["data" => $post], 200);
        } else {
            return response()->json([
                "message" => "No record found"
            ], 404);
        }
    }
}
