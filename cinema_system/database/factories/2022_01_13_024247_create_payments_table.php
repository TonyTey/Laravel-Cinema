<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('movieName');
            $table->string('date');
            $table->string('time');
            $table->integer('quantityTicket')->unsigned();
            $table->string('seatNo');
            $table->double('totalAmount',8,2);
            $table->string('foodID');
            $table->string('foodName');
            $table->string('userId');
            $table->double('ticketPrice',8,2);
            $table->double('foodDrinkPrice',8,2);
            $table->string('userName');
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
        Schema::dropIfExists('payments');
    }
}
