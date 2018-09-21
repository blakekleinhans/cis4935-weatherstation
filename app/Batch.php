<?php

namespace App;

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
		return $this->hasMany('App\Models\Reading');
	}
}
