<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;

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
    public function signup(RegisterRequest $request)
    {
        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            // Handle case when no image is provided
            $imageName = null;
        }

        // Create new user
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
            'division' => $request->input('division'),
            'zip' => $request->input('zip'),
            'image' => $imageName,
        ]);
        return view('profile' , compact('user'));
    }
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $user = Auth::user();
        return view('profile' , compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
