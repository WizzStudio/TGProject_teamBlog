<?php

namespace App\Http\Controllers;

use App\Post;
use App\Providers\DingDing;
use App\Tag;
use App\Type;
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
		$type = Type::where('l1_name', null)->get();
		return view('member.article.create', ['user' => $user->name, 'type' => $type]);
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
			$type = Type::where('l1_name', $request->l1)->where('l2_name', $request->l2)->first();
			if(empty($type)) {
				return response("请选择正确的分类", 400);
			}
			$post = Post::create ([
				'name' => $request->input('name'),
				'tag_id' => $tag_id,
				'md_content' => $request->input('content'),
				'html_content' => $request->input('editormd-html-code'),
				'user_id' => $user->id,
				'type_id' => $type->id,
			]);
			if (!$post) {
				return response("create fail",500);
			} else {
				if (!empty($type->ding_hook)) {
					$ding = new DingDing($type->ding_hook);
					$data = [
						'msgtype' => 'link',
						'link' => [
							'text' => mb_substr($post->md_content, 0, 50, 'utf-8'),
							'title' => $post->name,
							'messageUrl' => 'http://blog.helloyzy.cn/'
						]
					];
					$ding->send(json_encode($data));
				}
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
