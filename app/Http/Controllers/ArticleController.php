<?php

namespace App\Http\Controllers;

use App\Http\BC;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
		$user = Auth::user();
		$posts = $user->posts;
		return view('member.article.index', ['user' => $user->name, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$user = Auth::user();
		return view('member.article.create', ['user' => $user->name]);
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
		$user = Auth::user();
		if ($this->valid($request)) {
			$tag_id = $this->getTag ($request->tag);
			$post = Post::create ([
				'name' => $request->input('name'),
				'tag_id' => $tag_id,
				'md_content' => $request->input('content'),
				'html_content' => $request->input('editormd-html-code'),
				'user_id' => $user->id,
			]);
			if (!$post) {
				return response("create fail",400);
			} else {
				$title = $post->name;
				$content = ['title' => $title, 'user' => $user->name];
				$bc = new BC();
				$bc->notify($content);
				return redirect()->route('article.index');
			}
		}

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
		$post = Post::findOrFail($id);
		return view('member.article.edit', ['post' => $post]);
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
		$post = Post::findOrFail($id);
		if($this->valid($request) and $this->checkEditor($post->user_id)) {
			$tagId = $this->getTag($request->tag);
			$post->name = $request->input('name');
			$post->tag_id = $tagId;
 			$post->md_content = $request->input('content');
			$post->html_content = $request->input('editormd-html-code');
			$ret = $post->save();
			if($ret) {
				return redirect()->route('article.index');
			} else {
				return response("error", 500);
			}
		}


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
		$post = Post::findOrFail($id);
		$tagId = $post->tag_id;
		if($this->checkEditor($post->user_id)) {
			if($post->delete()) {
				if(Post::where('tag_id', '=', $tagId)->count() == 0) {
					Tag::destroy($tagId);
				}
				return response("ok", 200);
			} else {
				return response("error", 500);
			}
		}
    }

    private function valid($request)
	{
		$vaild = Validator::make($request->all(),[
			'name' => 'required|unique:posts|',
			'tag' => 'required',
			'content' => 'required',
		]);
		if($vaild->fails()) {
			return response($vaild->errors(), 400);
		} else {
			return true;
		}
	}

	private function getTag($tagName)
	{
		$tag = Tag::where('name', '=', $tagName)->first();
		if(empty($tag)) {
			$tag = Tag::create(['name' => $tagName]);
		}
		return $tag->id;
	}

	private function checkEditor($userId)
	{
		if(Auth::id() == $userId) {
			return true;
		} else {
			return response("Not editor", 403);
		}
	}
}
