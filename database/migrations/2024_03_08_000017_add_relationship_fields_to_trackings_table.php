<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTrackingsTable extends Migration
{
    public function up()
    {
        Schema::table('trackings', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id', 'campaign_fk_9578378')->references('id')->on('campaigns');
        });
    }
}
