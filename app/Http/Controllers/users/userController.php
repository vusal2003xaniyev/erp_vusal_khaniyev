<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function AddView(){
        return view('user.add');
    }
    public function addPost(Request $request){
        dd($request);
        $validated = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'permission*' => 'required',
        ]);

    }
}
