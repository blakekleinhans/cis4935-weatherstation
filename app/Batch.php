<?php

namespace App;

use App\Reading;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
	/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	 *  - Model Configuration - - - - - - - - - - - - - - - - - -
	 *  - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
	/** The table associated with the model.
	 * @var string */
	protected $table = 'batch_details';
	/** Indicates if the model should be timestamped.
	 * @var bool */
	public $timestamps = false;

	/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	 *  - Model Relationships - - - - - - - - - - - - - - - - - -
	 *  - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
	public function readings() {
		return $this->hasMany('App\Reading');
	}

	/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	 *  - Model Functions - - - - - - - - - - - - - - - - - - - -
	 *  - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
	public function getEST() {
		$est = date("Y-m-d H:i:s", strtotime($this->time . ' -5 hours'));
		return $est;
	}
}
