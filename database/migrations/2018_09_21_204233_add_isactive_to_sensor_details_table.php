<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsactiveToSensorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensor_details', function (Blueprint $table) {
            $table->boolean('is_active')
              ->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensor_details', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
