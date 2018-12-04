<?php

namespace App\Http\Controllers;

use App\Batch;
use App\User;
use App\Reading;
use App\Sensor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(Request $request)
    {
        // Handle legitimate requests
        $inputs = $request->input();
        // TODO: Compare against input keys
        if(isset($inputs['action'])) {
            // Handle request by action parameter
            switch ($inputs['action']) {
                case 'stationReadings':
                    $result = $this->actionStationReadings($inputs);
                    break;
                case 'stationDetails':
                    $result = $this->actionStationDetails($inputs);
                    break;
                case 'sensorDetails':
                    $result = $this->actionSensorDetails($inputs);
                    break;
                default:
                    $result = "Invalid Action";
            }
        } else {
            $result = "Invalid Parameters!";
        }
        return $result;
    }

    // TODO: Update to allow request for specific station/sensors
    public function get() {
        // TODO: Use values from request
        $sensors = [1,2,3,4,5,6];
        $data = [];
        foreach($sensors as $sensorId) {
            $sensor = Sensor::where('id', $sensorId)->get()->first();
            $data['sensor_'.$sensorId] = $sensor->readings->sortByAsc('batch_id')->first()->value;
        }
        return $data;
    }

    // Handle 'stationReadings' action
    protected function actionStationReadings($inputs) {
        // Verify parameters
        if($this->checkVars(['station_id'], $inputs)) {
            // Clean Up Inputs
            $station = $this->verifyStation($inputs['station_id']);
            $readings = $this->verifyReadings($inputs);

            // Store results of saveReadings for return
            $result = $this->saveReadings($station, $readings);
        } else {
            $result = "Invalid stationReadings parameters";
        }
        return $result;
    }

    // Handle 'stationDetails' action
    protected function actionStationDetails($inputs) {
        // Store station details
    }

    // Handle 'sensorDetails' action
    protected function actionSensorDetails($inputs) {
        // Store sensor details
    }

    // Make sure that we have all of the required variables
    // TODO: Improve
    protected function checkVars($key, $inputs) {
        foreach($key as $id) {
            if(!isset($inputs[$id])) {
                return false;
            }
        }
        return true;
    }

    // Store all sensor readings
    protected function saveReadings($station, $readings) {
        // TODO: Properly assign
        $station_id = 1;
        // Make Batch
        $batch = new Batch;
        $batch->station_id = $station_id;
        $batch->save();

        // Save sensor readings to database
        foreach($readings as $sensor_id => $value) {
            $reading = new  Reading;
            $reading->batch_id = $batch->id;
            $reading->station_id = $station_id;
            $reading->sensor_id = intval($sensor_id);
            $reading->value = floatval($value);
            $reading->save();
        }
    }

    protected function verifyReadings($readings) {
        // TODO: Make array of key values
        $keys = array_keys($readings);
        $verified_sensors = $this->verifySensors($keys);

        $data = [];
        foreach($verified_sensors as $sensor) {
            $data[$this->sensorNameToId($sensor)] = $readings[$sensor];
        }
        return $data;
    }

    // Handle unknown stations
    protected function verifyStation($id) {
        // Check if station is saved in database

        // Request station details

        // Store new station

        return $id;
    }

    // Handle unknown sensors
    protected function verifySensors($ids) {
        $data = [];
        foreach($ids as $id) {
            $sensor = Sensor::where('id', str_replace('sensor_','',$id))->first();
            if($sensor) {
                array_push($data, $id);
            }
        }
        return $data;
    }

    // Use sensor naming convention to derive sensor id
    // TODO: Use database to derive relative sensor_id to station
    protected function sensorNameToId($name) {
        return str_replace('sensor_', '', $name);
    }

}