<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function loginForm()
    {
        return view('auth.login');  // Update with your login view
    }

    // Login method (for both Admin and User)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect user based on their role
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            
            return redirect()->route('user.home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show the register form
    public function registerForm()
    {
        return view('auth.register');  // Update with your register view
    }

    // Register method (for both Admin and User)
    public function register(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Determine if registering an admin or regular user
        $isAdmin = $request->has('is_admin') && $request->is_admin == 'on' ? true : false;

        // Create user (or admin if specified)
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin,
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the correct dashboard
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.home');
    }

    // Logout method (for both Admin and User)
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.loginForm');
    }
}
