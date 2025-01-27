<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomMealsTable extends Migration
{
    public function up()
    {
        // Create custom_meals table
        Schema::create('custom_meals', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to users
            $table->string('name');  // Custom meal name
            $table->text('description')->nullable();  // Description of custom meal
            $table->timestamps();  // Created & Updated timestamps
        });

        // Create meal_plans table
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to users table
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade');  // Foreign key to foods table
            $table->string('meal_time');  // Breakfast, lunch, dinner, etc.
            $table->timestamps();  // Created & Updated timestamps
        });
    }

    public function down()
    {
        // Drop both tables in reverse order
        Schema::dropIfExists('meal_plans');
        Schema::dropIfExists('custom_meals');
    }
}
