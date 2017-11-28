<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
	protected $fillable = ['name'];

	protected $hidden = ['updated_at'];

	public function posts()
	{
		return $this->hasMany('App\Post');
	}
}
