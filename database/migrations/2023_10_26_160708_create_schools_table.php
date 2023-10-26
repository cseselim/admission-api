<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('code',50);
            $table->string('logo',255)->nullable();
            $table->string('phone',20)->nullable();
            $table->text('address')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->tinyInteger('has_shift')->nullable();
            $table->tinyInteger('has_version')->nullable();
            $table->tinyInteger('has_section')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
