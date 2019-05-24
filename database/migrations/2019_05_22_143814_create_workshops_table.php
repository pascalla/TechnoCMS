<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('subject_id')->unsigned();
          $table->string('image');
          // defaults order to 0
          $table->integer('order')->default(0);
          $table->timestamps();
          // soft deletes for data recovery
          $table->softDeletes();

          // foreign key to subject
          $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workshops');
    }
}
