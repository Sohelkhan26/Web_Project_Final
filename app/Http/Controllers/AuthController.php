<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login', ['action' => route('login.submit') , 'method' => 'POST']);
    }

    public function showRegisterForm()
    {
        return view('register', ['action' => route('register.submit') , 'method' => 'POST']);
    }
    public function signup(Request $request)
    {
//        dd($request->all());
        // Validate form.blade.php data
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'address' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'city' => 'required|string',
            'phone' => 'required|string',
            'division' => 'required|string',
            'zip' => 'required|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            // Handle case when no image is provided
            $imageName = null;
        }

        // Create new user
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->username = $request->input('username');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->division = $request->input('division');
        $user->zip = $request->input('zip');
        $user->image = $imageName;
        $user->save();

        // Redirect or return a response
        return view('profile' , compact('user'));
    }
    public function login(Request $request)
    {
        // Validation
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email'
        ]);
        $credentials = $request->only('password' , 'username' , 'email');

        // Attempt to authenticate user
        if (Auth::attempt($credentials)) {
//            Session::flash('msg', 'Logged in Successfully');

            // Authentication passed
            $user = Auth::user();
            return view('profile' , compact('user'));
        }
        Session::flash('msg', 'Username or Password or Email is incorrect');




//        Session::flash('msg', 'Error Successfully!');
        return redirect()->route('login.form');
        }
//        design a logout function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
