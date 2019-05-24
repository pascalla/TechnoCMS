<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // this table will store translations for the data
      Schema::create('subject_translations', function(Blueprint $table)
      {
          $table->increments('id');
          $table->integer('subject_id')->unsigned();
          $table->text('name');
          $table->text('description');
          $table->string('locale')->index();

          // make sure no duplicate data
          $table->unique(['subject_id','locale']);
          $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_translations');
    }
}
