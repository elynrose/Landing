<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAisTable extends Migration
{
    public function up()
    {
        Schema::table('ais', function (Blueprint $table) {
            $table->unsignedBigInteger('landing_page_id')->nullable();
            $table->foreign('landing_page_id', 'landing_page_fk_9578446')->references('id')->on('landing_pages');
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id', 'campaign_fk_9578447')->references('id')->on('campaigns');
        });
    }
}
