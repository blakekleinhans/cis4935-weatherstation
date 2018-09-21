<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
	/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	 *  - Model Configuration - - - - - - - - - - - - - - - - - -
	 *  - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
	/** The table associated with the model.
	 * @var string */
	protected $table = 'sensor_readings';
	/** Indicates if the model should be timestamped.
	 * @var bool */
	public $timestamps = false;

	/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	 *  - Model Relationships - - - - - - - - - - - - - - - - - -
	 *  - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
	public function batch() {
		return $this->belongsTo('App\Models\Batch');
	}
	public function sensor() {
		return $this->belongsTo('App\Models\Sensor');
	}
}
