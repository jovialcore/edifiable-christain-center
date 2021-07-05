<?php

namespace App\Http\Controllers;

use App\Models\AdminForm;
use Illuminate\Http\Request;

class AdminFormController extends Controller
{
    public function store(Request $req)
    {
        AdminForm::create([
            'title'=> $req->title,
        ]);
    }
}
