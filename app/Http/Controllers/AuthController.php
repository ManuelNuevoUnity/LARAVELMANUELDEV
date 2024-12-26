<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register'); // Return the registration view
    }

    // Handle registration
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user with the hashed password
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Debug: Print the created user
 

        // Redirect to login or to a different page
        return redirect()->route('login.form')->with('success', 'Registration successful. You can now log in.');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Return the login view
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect to a specific page after login (change this if needed)
            return redirect()->route('home'); // Redirect to home instead of dashboard
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid login credentials.'])->withInput();
        }
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
