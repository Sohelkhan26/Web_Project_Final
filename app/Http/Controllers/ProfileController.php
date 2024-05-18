<?php

namespace App\Http\Controllers;

use App\Models;
use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
//        dd($user);
    return view('profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $imageName = null;
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
//            i want to delete the previous image from the public/image directory
            $image_path = public_path('images').'/'.$user->image;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->division = $request->division;
        $user->zip = $request->zip;
        $user->image = $imageName;
        $user->save();
        return redirect()->route('profile');
    }
}
