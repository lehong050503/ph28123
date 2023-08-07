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
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id_flight');
            $table->integer('id_airline')->unsigned();
            $table->foreign('id_airline')->references('id_airline')->on('airlines');
            $table->integer('id_form_airport')->unsigned();
            $table->foreign('id_form_airport')->references('id_airport')->on('airport');
            $table->integer('id_to_airport')->unsigned();
            $table->foreign('id_to_airport')->references('id_airport')->on('airport');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('seat');
            $table->string('status_flight');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
