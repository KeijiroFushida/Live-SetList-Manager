<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusic extends Migration
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
            $table->unsignedInteger('artist_id');
            $table->foreign('artist_id')->reference('id')->on('artists');
            $table->integer('live_id');
            $table->string('music_name');
            $table->integer('set_list');
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
        Schema::dropIfExists('music');
    }
}
