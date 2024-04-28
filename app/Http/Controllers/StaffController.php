<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function showRegistrationForm()
{
    return view('register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:staff',
        'password' => 'required|string|min:8|confirmed',
    ]);

    Staff::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/loginstaff')->with('success', 'Registration successful. You can now log in.');
}

public function showLoginForm()
{
    return view('login');
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // dd($credentials);

    if (Auth::attempt($credentials)) {
        // Authentication successful
        return redirect()->intended('/dashboard');
    }

    // Authentication failed
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

}
