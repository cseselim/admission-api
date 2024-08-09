<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('student_name',100);
            $table->string('father_name',100);
            $table->string('father_nid_no',50)->nullable();
            $table->string('father_occupation',50)->nullable();
            $table->string('father_contact',50)->nullable();
            $table->string('occupation_category',50)->nullable();
            $table->decimal('guardian_income',2)->nullable();
            $table->string('unit',255)->nullable();
            $table->string('rank',255)->nullable();
            $table->string('mother_name',100)->nullable();
            $table->string('mother_occupation',50)->nullable();
            $table->string('mother_contact',50)->nullable();
            $table->string('email_address',100)->nullable();
            $table->string('contact_number',100)->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('present_address')->nullable();
            $table->string('date_of_birth',100);
            $table->string('birth_registration_no',50)->nullable();
            $table->string('student_sex',150);
            $table->string('religion',50);
            $table->string('last_school_name',100)->nullable();
            $table->string('last_exam',100)->nullable();
            $table->string('last_exam_roll',50)->nullable();
            $table->string('last_exam_result',50)->nullable();
            $table->string('blood_group',50)->nullable();
            $table->string('height',255)->nullable();
            $table->string('legal_guardian_name',255)->nullable();
            $table->string('relation_with_guardian',100)->nullable();
            $table->string('legal_guardian_occupation',255)->nullable();
            $table->decimal('legal_guardian_income',2)->nullable();
            $table->text('skill')->nullable();
            $table->string('profile_image',255)->nullable();
            $table->string('birth_certificate',255)->nullable();
            $table->string('unit_certificate',255)->nullable();
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
        Schema::dropIfExists('student_profiles');
    }
}
