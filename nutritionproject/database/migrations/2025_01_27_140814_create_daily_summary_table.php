<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailySummaryTable extends Migration
{
    public function up()
    {
        Schema::create('daily_summaries', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to users
            $table->date('date');  // Date for daily summary
            $table->enum('status', ['today', 'yesterday', 'last_week', 'custom'])->default('today'); // Timeframe status (Today, Yesterday, etc.)
            
            // Total nutrients consumed
            $table->float('calories_consumed')->nullable(); // Total calories consumed that day
            $table->float('protein_consumed')->nullable(); // Total protein consumed
            $table->float('carbs_consumed')->nullable(); // Total carbs consumed
            $table->float('fat_consumed')->nullable(); // Total fat consumed
            $table->float('fiber_consumed')->nullable(); // Total fiber consumed
            $table->float('sodium_consumed')->nullable(); // Total sodium consumed
            $table->float('sugar_consumed')->nullable(); // Total sugar consumed

            // Remaining values to meet goal
            $table->float('calories_remaining')->nullable(); // Calories remaining to reach the goal
            $table->float('protein_remaining')->nullable(); // Protein remaining
            $table->float('carbs_remaining')->nullable(); // Carbs remaining
            $table->float('fat_remaining')->nullable(); // Fat remaining
            $table->float('fiber_remaining')->nullable(); // Fiber remaining
            $table->float('sodium_remaining')->nullable(); // Sodium remaining
            $table->float('sugar_remaining')->nullable(); // Sugar remaining
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_summaries');
    }
}