<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressiveTrackingTable extends Migration
{
    public function up()
    {
        Schema::create('progressive_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User foreign key
            $table->date('date'); // Date of tracking
            $table->float('calories_consumed')->nullable(); // Calories consumed
            $table->float('protein_consumed')->nullable(); // Protein consumed
            $table->float('carbs_consumed')->nullable(); // Carbs consumed
            $table->float('fat_consumed')->nullable(); // Fat consumed
            $table->float('fiber_consumed')->nullable(); // Fiber consumed
            $table->float('sodium_consumed')->nullable(); // Sodium consumed
            $table->float('sugar_consumed')->nullable(); // Sugar consumed
            $table->float('calories_goal')->nullable(); // Goal calories for the day
            $table->float('protein_goal')->nullable(); // Goal protein for the day
            $table->float('carbs_goal')->nullable(); // Goal carbs for the day
            $table->float('fat_goal')->nullable(); // Goal fat for the day
            $table->float('fiber_goal')->nullable(); // Goal fiber for the day
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('progressive_tracking');
    }
}