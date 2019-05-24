<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // This will hold translations for the workshop model
      Schema::create('resource_translations', function(Blueprint $table)
      {
          $table->increments('id');
          $table->integer('resource_id')->unsigned();
          $table->text('name');
          $table->string('locale')->index();

          $table->unique(['resource_id','locale']);
          $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_translations');
    }
}
