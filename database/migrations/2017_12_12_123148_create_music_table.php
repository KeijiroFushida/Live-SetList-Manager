<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music',function(Blueprint $table) {
            $table->increments('id');
            $table->integer('live_id');
            $table->integer('order');
            $table->unsignedInteger('artist_id');
            $table->string('music_name');
            $table->timestamps();

            $table->unique(['live_id', 'order']);
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music');
    }
}
