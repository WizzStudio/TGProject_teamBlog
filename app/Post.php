<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	protected  $fillable = [
		'user_id', 'tag_id', 'md_content', 'html_content', 'name', 'view', 'type_id',
	];

	protected $hidden = [
		'html_content'
	];

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tag()
	{
		return $this->belongsTo('App\Tag');
	}

	public function type()
	{
		return $this->belongsTo('App\Type');
	}
}
