<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stripe_transaction');
            $table->decimal('amount_paid', 15, 2);
            $table->string('credit');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
