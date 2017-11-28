<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$users = User::where('level', '=', 0)->paginate(12);
		return view('admin.user', ['users' => $users]);
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
		$posts = Post::where('user_id', '=', $id)->orderby('id', 'desc')->paginate(12);
		return view('admin.post', ['posts' => $posts]);
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
		$user = User::findOrFail($id);
		$user->level = 1;
		if($user->save()) {
			return response("ok", 200);
		} else {
			return response("error", 400);
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
		$user = User::findOrFail($id);
		foreach ($user->posts as $eachPost) {
			if(Post::where('tag_id', '=', $eachPost->tag_id)->count() == 1) {
				Tag::destroy($eachPost->tag_id);
			}
			$eachPost->delete();
		}
		$user->delete();
		return response("ok", 200);
    }
}
