<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->increments('id');

            $table->string('text');
            $table->integer('scene_id')->unsigned();
            $table->integer('character_id')->unsigned()->nullable();

            $table->foreign('scene_id')->references('id')->on('scenes');
            $table->foreign('character_id')->references('id')->on('characters');

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
        Schema::dropIfExists('lines');
    }
}
