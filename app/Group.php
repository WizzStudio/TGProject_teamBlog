<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
	protected $fillable = [
		'url', 'name', 'github', 'desc'
	];
}
