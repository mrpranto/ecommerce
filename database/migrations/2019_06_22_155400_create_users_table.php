<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->tinyInteger('admin')->default(0);
            $table->string('name',80);
            $table->string('email',128)->unique();
            $table->string('phone_number',32)->unique();
            $table->string('password');
            $table->tinyInteger('email_verify')->default(0);
            $table->date('email_verifed_at')->nullable();
            $table->string('email_verification_token',32)->nullable();
            $table->string('password_reset_token',32)->nullable();
            $table->string('remember_token',32)->nullable();
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
