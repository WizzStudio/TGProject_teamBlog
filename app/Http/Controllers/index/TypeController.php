<?php

namespace App\Http\Controllers\index;

use App\Post;
use App\Type;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$type = Type::where('p_id', '>', 0)->orderby('id', 'desc')->get(['id', 'l1_name', 'l2_name']);
		foreach ($type as $eachType) {
			$num = Post::where('type_id', $eachType->id)->count();
			$eachType['article_num'] = $num;
		}
		return response($type, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$articles = Post::where('type_id', $id)->orderby('id', 'desc')->paginate(10);
		return response($articles, 200);
    }
}
