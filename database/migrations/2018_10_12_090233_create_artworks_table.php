<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->integer('collection_id');
            $table->integer('artist_id')->nullable();
            $table->string('file')->nullable();
            $table->integer('meas_x')->nullable();
            $table->integer('meas_y')->nullable();
            $table->integer('meas_z')->nullable();
            $table->integer('value')->nullable();
            $table->date('published_at')->nullable();
            $table->date('purchased_at')->nullable();
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
        Schema::dropIfExists('artworks');
    }
}
