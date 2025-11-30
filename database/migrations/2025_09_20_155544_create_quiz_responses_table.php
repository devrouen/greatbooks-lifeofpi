<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz_responses', function (Blueprint $table) {
            $table->id('response_id');
            $table->unsignedBigInteger('attempt_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('selected_option_id')->nullable();
            $table->string('answer_text')->nullable();
            $table->boolean('is_correct');
            $table->integer('points_earned')->default(0);
            $table->integer('time_spent')->nullable();
            $table->timestamp('answered_at')->useCurrent();

            $table->foreign('attempt_id')
                  ->references('attempt_id')
                  ->on('quiz_attempts')
                  ->onDelete('cascade');

            $table->foreign('question_id')
                  ->references('question_id')
                  ->on('questions')
                  ->onDelete('cascade');

            $table->foreign('selected_option_id')
                  ->references('option_id')
                  ->on('question_options')
                  ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_responses');
    }
};
