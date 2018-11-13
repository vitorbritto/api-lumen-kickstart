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
            $table->increments('id');
            $table->string('uid', 36)->unique();
            $table->char('cpf', 11)->unique()->nullable();
            $table->string('name', 50);
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->char('phone', 16)->nullable();
            $table->char('mobile', 16)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->date('birth')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('avatar')->nullable();
            $table->string('email', 80)->unique();
            $table->string('password', 255)->nullable();
            $table->tinyInteger('status');
            $table->enum('role', ['BASIC_USER', 'ADMIN_USER'])->default('BASIC_USER');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
