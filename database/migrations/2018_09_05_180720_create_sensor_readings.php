<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorReadings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_readings', function (Blueprint $table) {
            $table->unsignedInteger('batch_id');
            $table->unsignedInteger('station_id');
            $table->float('value', 8, 4);

            // Handle Foreign Key
            // TODO: Correct
            //$table->foreign('batch_id')->references('id')->on('batch_details');
            //$table->foreign('sensor_id')->references('id')->on('sensor_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_readings');
    }
}
