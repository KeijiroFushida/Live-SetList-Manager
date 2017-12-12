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
        Schema::create('events',function(Blueprint $table) {
            $table->increments('id');
            $table->unsigned_integer('artist_id');
            $table->foreign('artist_id')->reference('id')->on('artists');
            $table->integer('live_id');
            $table->string('music_name');
            $table->integer('set_list');
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
