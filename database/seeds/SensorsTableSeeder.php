<?php

use Illuminate\Database\Seeder;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table('sensor_details')->insert([
	    	'station_id' => 1,
	    	'name' => 'Test Sensor',
		    'is_active' => true,
	    ]);
    }
}
