<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuizAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('quiz_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->foreign('quiz_id', 'quiz_fk_9578839')->references('id')->on('quizzes');
            $table->unsignedBigInteger('email_id')->nullable();
            $table->foreign('email_id', 'email_fk_9578840')->references('id')->on('waiting_lists');
        });
    }
}
