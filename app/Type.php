<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
	public $fillable = [
		'p_id', 'l1_name', 'l2_name', 'desc', 'ding_hook',
	];

	public function posts()
	{
		return $this->hasMany('App\Post');
	}
}
