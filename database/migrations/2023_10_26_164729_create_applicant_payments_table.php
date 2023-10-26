<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('student_profiles');
            $table->string('name',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',50)->nullable();
            $table->decimal('amount',2)->nullable();
            $table->text('address')->nullable();
            $table->string('transactionId',255)->nullable();
            $table->string('orderId',255)->nullable();
            $table->string('currency',100)->nullable();
            $table->string('val_id',255)->nullable();
            $table->string('card_type',100)->nullable();
            $table->decimal('store_amount',2)->nullable();
            $table->string('bank_status',100)->nullable();
            $table->string('card_brand',100)->nullable();
            $table->string('payment_gateway',100)->nullable();
            $table->dateTime('transaction_date')->nullable();
            $table->text('all_info')->nullable();
            $table->string('payment_status',100)->nullable();
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
        Schema::dropIfExists('applicant_payments');
    }
}
