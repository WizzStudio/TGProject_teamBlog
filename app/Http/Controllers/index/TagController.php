<?php

namespace App\Http\Controllers\index;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$tags = Tag::all()->toJson();
		return response($tags, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
		$tag = Tag::findOrFail($id);
		$posts = Post::where('tag_id', '=', $tag->id)->paginate(10)->toArray();		//标签下文章分页
		foreach ($posts['data'] as &$eachPost) {									//&修改为引用数组
			$user = User::find($eachPost['user_id'])->toArray();					//获取文章对应作者信息
			$eachPost['md_content'] = mb_substr($eachPost['md_content'], 0, 200 ,'utf-8');
			$eachPost['user'] = $user;
		}
		unset($eachPost);			//释放引用
		return response(json_encode($posts), 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
