<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkshopTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // This will hold translations for the workshop model
      Schema::create('workshop_translations', function(Blueprint $table)
      {
          $table->increments('id');
          $table->integer('workshop_id')->unsigned();
          $table->text('name');
          $table->text('description');
          $table->string('locale')->index();

          $table->unique(['workshop_id','locale']);
          $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workshop_translations');
    }
}
