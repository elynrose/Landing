<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCampaignsTable extends Migration
{
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->unsignedBigInteger('list_id')->nullable();
            $table->foreign('list_id', 'list_fk_9578339')->references('id')->on('waiting_lists');
        });
    }
}
