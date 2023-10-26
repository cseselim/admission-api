<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_numbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreignId('class_id');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->string('admission_number',100);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('admission_numbers');
    }
}
