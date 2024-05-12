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
//        dd($request->name);
//       dd($request->all());
//        Auth::user() -> address = $request -> address;
        Auth::user() -> update($request->all());
        return redirect()->route('profile');
    }
}
