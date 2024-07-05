<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function loginView(){
        return view('login');
    }
    public function loginPost(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        $user=DB::table('users')->where([
            'email'=>$request->email,
            'status'=>'1'
        ])->first();
        if($user){
            $check=Auth::attempt($request->only('email','password'));
            if($check){
                return redirect()->route('index_page_view');
            }
            return redirect()->route('login_page_view')->with('error_login',true);
        }
        return redirect()->route('login_page_view')->with('error_login',true);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login_page_view');
    }
}
