<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('class');
            $table->string('name', 100); 
            $table->string('full_name')->nullable();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('level');
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->integer('point')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
