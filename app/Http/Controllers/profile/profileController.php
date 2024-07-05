<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class profileController extends Controller
{
    public function profileView()
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        View::share([
            'user' => $user,
        ]);
        return view('profile.profile');
    }
    public function profileInformationPost(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required|max:50',
            'address' => 'required|max:1000',
            'birthday' => 'required',
            'qualification' => 'required|max:1000',
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        $image_name = $request->old_image;
        if ($request->hasFile('image')) {
            if (file_exists($image_name) && $image_name != 'uploads\profile.png') {
                unlink($image_name);
            }
            $directory = "uploads/profile/";
            $image = $request->file('image');
            $image_name = $request->fullname . "-" . rand(100000, 999999) . "." . $image->getClientOriginalExtension();
            $image->move($directory, $image_name);
            $image_name = $directory . $image_name;
        }
        $edit = DB::table('users')->where([
            'id' => Auth::user()->id
        ])->update([
            'name' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
            'image' => $image_name,
            'updated_at' => now(),
        ]);
        return redirect()->back()->with($edit ? 'editSuccess' : 'error', true);
    }
    public function profilePasswordPost(Request $request)
    {
        $validated = $request->validate([
            'new_password' => 'required|min:8',
            'repeat_new_password' => 'required|same:new_password|min:8',
        ]);
        if (!Hash::check($request->current_password,Auth::user()->password)) {
            return redirect()->back()->with('errorPassword', true);
        }
        
        $edit = DB::table('users')->where([
            'id' => Auth::user()->id
        ])->update([
            'password' => Hash::make($request->repeat_new_password),
            'updated_at' => now()
        ]);
        return redirect()->back()->with($edit ? 'editSuccess' : 'error', true);
    }
}
