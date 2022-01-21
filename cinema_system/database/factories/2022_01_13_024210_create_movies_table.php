<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->double('price', 8, 2);
            $table->string('image');
            $table->string('trailer');
            $table->string('video');
            $table->integer('duration')->unsigned();
            $table->string('releaseDate');
            $table->string('subtitle');
            $table->string('cast');
            $table->string('director');
            $table->string('label');
            $table->string('distributor');
            $table->string('branchID');
            $table->string('status');
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
        Schema::dropIfExists('movies');
    }
}
