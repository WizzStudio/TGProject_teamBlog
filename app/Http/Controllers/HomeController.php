<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		if($user->level == 1){
			$postNum = Post::all()->count();
			$tagNum = Tag::all()->count();
			$userNum = User::all()->count();
			$hotPost = Post::orderby('view','desc')->take(10)->get();
			return view('home',[
				'user' => $user->name,
				'post_num' => $postNum,
				'tag_num' => $tagNum,
				'user_num' => $userNum,
				'posts' => $hotPost
			]);
		}else{
			$posts = $user->posts;
			return view('member.article.index', ['user' => $user->name, 'posts' => $posts]);
		}

    }
}
