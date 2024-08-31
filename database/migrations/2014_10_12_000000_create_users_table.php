<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->string('phone',20)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('salt',255)->nullable();
            $table->string('password',255);
            $table->integer('is_first_login')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('user_type')->nullable()->comment('1=admin,2=teacher,3=parent');
            $table->tinyInteger('role_id')->nullable();
            $table->string('profile_pic',255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
