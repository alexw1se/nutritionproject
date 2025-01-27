<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Admin registration
    public function register(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create admin user
        $admin = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true, // This makes it an admin account
        ]);

        // Log the admin in
        Auth::login($admin);

        // Redirect to dashboard or wherever the admin should land after login
        return redirect()->route('admin.dashboard');
    }

    // Admin login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home'); // Redirect non-admin users to their dashboard
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Admin logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
