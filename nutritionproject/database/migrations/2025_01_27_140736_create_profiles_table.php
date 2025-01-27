<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User foreign key
            $table->integer('age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->float('weight'); // Weight in lbs
            $table->float('height'); // Height in inches
            $table->enum('activity_level', ['sedentary', 'light', 'moderate', 'active', 'very_active']); // User activity level
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}