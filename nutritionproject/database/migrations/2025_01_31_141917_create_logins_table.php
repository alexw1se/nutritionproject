<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLoginsTable extends Migration
{
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to users table
            $table->timestamp('login_time')->default(DB::raw('CURRENT_TIMESTAMP'));  // Login timestamp
            $table->string('ip_address');  // IP address of the user
            $table->text('user_agent');  // User agent string (browser/device details)
            $table->boolean('success')->default(true);  // Success of the login attempt
            $table->timestamps();  // Created & Updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('logins');
    }
}


//Inserting Login Data on Successful Login
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;

// public function login(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:6',
//     ]);

//     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//         // Login successful, log the login event
//         $user = Auth::user();

//         DB::table('logins')->insert([
//             'user_id' => $user->id,
//             'login_time' => now(),  // Current timestamp
//             'ip_address' => $request->ip(),  // IP address of the user
//             'user_agent' => $request->header('User-Agent'),  // User-agent (browser/device)
//             'success' => true,  // Mark as a successful login
//         ]);

//         return redirect()->intended('/dashboard');  // Redirect to dashboard or home page
//     }

//     // Login failed
//     DB::table('logins')->insert([
//         'user_id' => $request->user_id,
//         'login_time' => now(),
//         'ip_address' => $request->ip(),
//         'user_agent' => $request->header('User-Agent'),
//         'success' => false,  // Mark as failed login
//     ]);

//     return back()->withErrors(['email' => 'Invalid credentials']);
// }
