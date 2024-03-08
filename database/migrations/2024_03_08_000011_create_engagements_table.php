<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngagementsTable extends Migration
{
    public function up()
    {
        Schema::create('engagements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_encode');
            $table->integer('open')->nullable();
            $table->integer('click')->nullable();
            $table->string('ip_address');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
