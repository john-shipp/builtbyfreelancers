<?php

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
            $table->string('linkedin_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('tagline');
            $table->string('country');
            $table->string('location');
            $table->string('avatar_url');
            $table->string('remember_token');
            $table->string('email')->unique();
            $table->timestamps();
            $table->index('linkedin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
