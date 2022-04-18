<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_image', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('song_id')->unsigned();
            $table->bigInteger('image_id')->unsigned();
            $table->timestamps();

            $table->foreign('song_id')->references('id')->on('songs')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song_image');
    }
};
