<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAisTable extends Migration
{
    public function up()
    {
        Schema::create('ais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('recommendations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
