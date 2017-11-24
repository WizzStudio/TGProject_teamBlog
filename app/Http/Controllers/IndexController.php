<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
	public function index()
	{
		return view('welcome');
	}

	public function user($id)
	{
		var_dump($id);
	}

	public function article($id)
	{

	}
}
