<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('username')->unique();  // Unique username
            $table->string('email')->unique();  // Unique email
            $table->timestamp('email_verified_at')->nullable();  // Email verification timestamp
            $table->string('password');  // Password field
            $table->rememberToken();  // Remember token for "remember me"
            $table->boolean('is_admin')->default(false);  // Admin flag (default false)
            $table->timestamps();  // Created & Updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
