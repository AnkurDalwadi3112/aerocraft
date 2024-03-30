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
            $table->string('Fname')->nullable();
            $table->string('Lname')->nullable();
            $table->string('email')->unique();
            $table->string('c_code')->nullable();
            $table->integer('number')->nullable();
            $table->string('Address')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Hobby')->nullable();
            $table->string('Photo')->nullable();
            $table->date('created_date')->nullable();
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
