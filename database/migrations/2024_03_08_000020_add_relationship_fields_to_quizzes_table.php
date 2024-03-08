<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuizzesTable extends Migration
{
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->unsignedBigInteger('landing_page_id')->nullable();
            $table->foreign('landing_page_id', 'landing_page_fk_9578846')->references('id')->on('landing_pages');
        });
    }
}
