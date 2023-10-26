<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id');
            $table->foreign('parent_id')->references('id')->on('users');
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('student_profiles');
            $table->foreignId('school_id');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreignId('class_id');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreignId('version_id');
            $table->foreign('version_id')->references('id')->on('versions');
            $table->foreignId('shift_id');
            $table->foreign('shift_id')->references('id')->on('shifts');
            $table->string('student_age',255)->nullable();
            $table->string('session',100)->nullable();
            $table->string('transaction_id',255)->nullable();
            $table->string('payment_status',100)->nullable();
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
        Schema::dropIfExists('applicant_students');
    }
}
