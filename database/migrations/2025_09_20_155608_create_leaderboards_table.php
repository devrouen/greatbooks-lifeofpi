<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('leaderboard', function (Blueprint $table) {
            $table->id('rank_id');
            $table->string('username', 50);
            $table->enum('difficulty_level', ['easy', 'medium', 'hard']);
            $table->integer('best_score');
            $table->decimal('best_percentage', 5, 2);
            $table->integer('total_attempts')->default(1);
            $table->integer('fastest_time')->nullable();
            $table->timestamp('last_played')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            $table->unique(['username', 'difficulty_level'], 'unique_user_difficulty');
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaderboard');
    }
};
