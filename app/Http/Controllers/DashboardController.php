<?php

namespace App\Http\Controllers;

use App\Batch;
use App\User;
use App\Reading;
use App\Sensor;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        $data = [
            'lastBatch' => Batch::all()->sortByDesc('id')->first(),
            'sidebarOptionsMain' => $this->sidebarOptionsMain,
            'sensors' => $this->sidebarOptions(),
        ];
        return view('dashboard.home', $data);
    }

    /** Show the dashboard for the given sensor
     * @param int $id
     * @return Response */
    public function sensor($id) {
    	$sensorReadings = Reading::where('sensor_id', $id)->orderBy('id', 'desc')->paginate(20);
    	/*if(count($sensorData) == 0) {
    		return 'No Data for Sensor ' . $id;
	    }*/
	    $data = [
	    	'readings' => $sensorReadings,
		    'sensor' => Sensor::where('id', $id)->get()->first(),
		    'sidebarOptionsMain' => $this->sidebarOptionsMain,
		    'sensors' => $this->sidebarOptions(),
	    ];
    	return view('dashboard.sensor', $data);
    }

    /** Links for the sidebar
     * @var array */
    protected $sidebarOptionsMain = [
    	['name' => 'Current Conditions', 'link' => '/'],
        //['name' => 'Station Info', 'link' => 'station'],
    ];

    /** Build links for active sensors */
    protected function sidebarOptions() {
			$activeSensors = Sensor::where('is_active', true)->get()->all();
			$sidebarOptionsSensors = [];
			foreach($activeSensors as $activeSensor) {
				$sensorInfo = [
					'name' => $activeSensor->name,
					'link' => 'sensor/' . $activeSensor->id,
				];
				array_push($sidebarOptionsSensors, $sensorInfo);
			}
			return $sidebarOptionsSensors;
    }
}