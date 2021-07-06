<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class FeedSection extends Controller
{
    public  function  index()
    {
       $post =  Posts::get()->toArray();

       return response()->json(["data" => $post]);

   }

}
