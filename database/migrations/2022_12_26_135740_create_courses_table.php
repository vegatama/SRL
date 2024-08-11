<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('id_course')->unique();
            $table->string('class');
            $table->string('subject');
            $table->string('title');
            $table->integer('hours');
            $table->string('video')->nullable();
            $table->string('audio')->nullable();
            $table->string('summary')->nullable();
            $table->string('file')->nullable();
            $table->string('test_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
