<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_sent')->nullable();
            $table->integer('total_delivered')->nullable();
            $table->integer('total_bounced')->nullable();
            $table->integer('opens')->nullable();
            $table->integer('clicks')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('unique_clicks')->nullable();
            $table->integer('unique_opens')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
