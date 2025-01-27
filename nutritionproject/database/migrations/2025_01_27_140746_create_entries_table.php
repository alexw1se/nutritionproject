<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('food_entries', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure InnoDB engine for foreign key support
            
            // Define the primary columns
            $table->id();
            $table->unsignedBigInteger('user_id'); // Explicitly define user_id as unsignedBigInteger
            $table->unsignedBigInteger('food_id'); // Explicitly define food_id as unsignedBigInteger

            // Define the foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // User foreign key
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade'); // Food foreign key

            // Other columns for the entries
            $table->float('quantity'); // Number of servings consumed
            $table->enum('portion_size', ['small', 'medium', 'large'])->default('medium'); // Portion size of food
            $table->date('date'); // Date when food was consumed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_entries');
    }
}
