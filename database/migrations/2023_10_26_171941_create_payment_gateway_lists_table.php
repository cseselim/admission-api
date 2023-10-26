<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatewayListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateway_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->string('app_keys',255)->nullable();
            $table->string('app_secret',255)->nullable();
            $table->string('username',100)->nullable();
            $table->string('password',100)->nullable();
            $table->string('merchant_id',100)->nullable();
            $table->string('paymentGateway',100)->nullable();
            $table->decimal('amount',2);
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_gateway_lists');
    }
}
