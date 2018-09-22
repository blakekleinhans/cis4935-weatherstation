<?php

use Illuminate\Database\Seeder;

class SensorsTableSeeder extends Seeder
{
    /** Run the database seeds.
     * @return void */
    public function run()
    {
        // Populate Station 1 Sensors
        for($i=0; $i<count($this->station_1_sensors); $i++) {
            DB::table('sensor_details')->insert([
                'station_id' => 1,
                'name' => $this->station_1_sensors[$i],
                'is_active' => true,
            ]);
        }
    }
    /** Default sensor names for station 1
     * @var array */
    protected $station_1_sensors = [
        'Humidity',
        'Pressure',
        'Temperature',
        'Rainfall',
        'Wind Speed',
        'Wind Direction',
    ];
}
