<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $fillable = [
		'name', 'user_id', 'email', 'content', 'post_id'
	];

	public function posts()
	{
		return $this->hasMany('App\Post');
	}
}
