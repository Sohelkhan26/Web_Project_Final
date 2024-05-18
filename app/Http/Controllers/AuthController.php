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
//    create a function that retrieves the image provided by the user and saves it in the public/images directory
    public function uploadImage(Request $request)
    {
        // Validate the request to make sure a file was uploaded
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Get the original image file name
            $originalName = $request->image->getClientOriginalName();

            // Generate a unique file name to avoid overwriting existing files
            $uniqueName = time() . '_' . $originalName;

            // Move the image to the public/images directory
            $request->image->move(public_path('images'), $uniqueName);

            // Return the path of the uploaded image
            return response()->json(['image_path' => 'images/' . $uniqueName], 200);
        }

        return response()->json(['error' => 'No file was uploaded.'], 400);
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
        return redirect()->route('login.form');
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
