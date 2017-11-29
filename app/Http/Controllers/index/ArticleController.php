<?php

namespace App\Http\Controllers\index;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$articles = Post::paginate(10)->toArray();
		foreach ($articles['data'] as &$eachPost) {									//&修改为引用数组
			$user = User::find($eachPost['user_id'])->toArray();					//获取文章对应作者信息
			$tag = Tag::find($eachPost['tag_id'])->toArray();
			$eachPost['md_content'] = mb_substr($eachPost['md_content'], 0, 200, 'utf-8');
			$eachPost['user'] = $user;
			$eachPost['tag'] = $tag;
		}
		unset($eachPost);
		return response(json_encode($articles), 200);
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
		$article = Post::findOrFail($id);
		$article->view = $article->view + 1;
		$article->save();
		$articleArray = $article->toArray();
		$user = User::find($article['user_id'])->toArray();					//获取文章对应作者信息
		$tag = Tag::find($article['tag_id'])->toArray();					//标签信息
		$articleArray['user'] = $user;
		$articleArray['tag'] = $tag;
		return response(json_encode($article), 200);
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
