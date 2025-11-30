<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id('answer_id');
            $table->unsignedBigInteger('question_id');
            $table->string('answer_text');
            $table->boolean('is_case_sensitive')->default(false);

            $table->foreign('question_id')
                  ->references('question_id')
                  ->on('questions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('question_answers');
    }
};
