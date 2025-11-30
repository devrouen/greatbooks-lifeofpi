<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id('attempt_id');
            $table->string('username', 50);
            $table->enum('difficulty_level', ['easy', 'medium', 'hard']);
            $table->integer('total_questions')->default(0);
            $table->integer('correct_answers')->default(0);
            $table->integer('total_score')->default(0);
            $table->integer('time_taken')->nullable(); // in seconds
            $table->timestamp('completed_at')->useCurrent();
            $table->integer('timezone_offset')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_attempts');
    }
};
