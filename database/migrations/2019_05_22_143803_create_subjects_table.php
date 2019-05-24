<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create database
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            // set default order to 0
            $table->integer('level');
            $table->integer('order')->default(0);
            $table->timestamps();
            // soft deletes for data recovery
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
        Schema::dropIfExists('subjects');
    }
}
