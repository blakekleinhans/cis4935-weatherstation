<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // Sanitize and save raw data


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


    // Handle 'stationReadings' action
    protected function actionStationReadings($inputs) {
        // Verify parameters
        if($this->checkVars(['stationId'], $inputs)) {
            // Clean Up Inputs
            $station = $this->verifyStation($inputs['stationId']);
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
        // Make batch
        // TODO: Implement

        // TODO: Properly assign
        $batch_id = 1;

        // Save sensor readings to database
        foreach($readings as $id => $reading) {
            DB::table('sensor_readings')->insert([
                'batch_id'  => $batch_id,
                'sensor_id' => $id,
                'value'     => $reading,
            ]);
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

    }

    // Handle unknown sensors
    protected function verifySensors($ids) {
        return $ids;
    }

    // Use sensor naming convention to derive sensor id
    // TODO: Use database to derive relative sensor_id to station
    protected function sensorNameToId($name) {
        return str_replace('sensor_', '', $name);
    }

}