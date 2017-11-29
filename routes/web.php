<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('tgBlogAdmin')->middleware(['auth', 'admin'])->group(function (){					//管理后台相关路由
	Route::resource('group', 'GroupController', ['only' => ['index', 'update']]);				//团队设置
	Route::resource('member', 'MemberController');	//成员管理
	Route::resource('link', 'LinkController');													//友情链接管理
	Route::resource('post', 'PostController', ['only' => ['index', 'destroy', 'show']]);		//文章管理
	Route::resource('tag', 'TagController', ['only' => ['index', 'destroy', 'show']]);			//标签管理
	Route::get('invite', 'GroupController@inviteCode')->name('invite');							//生成邀请码
});

Route::prefix('tgMember')->middleware('auth')->group(function (){						//成员后台相关路由
	Route::resource('user', 'UserController', ['only' => ['index', 'update', 'edit']]);	//个人设置
	Route::resource('article', 'ArticleController');									//文章管理
	Route::get('search_tag',function (\Illuminate\Http\Request $request){				//现有标签,文章发布时可用
		$data = $request->input('data');
		$tag = \App\Tag::where('name','like',"%$data%")->get()->toJson();
		return $tag;
	})->name('search_tag');
});

Route::prefix('/')->group(function (){										//游客路由
	Route::get('link', function (){											//友情链接
		$links = \App\Link::all()->toJson();
		return response($links, 200)->header('Access-Control-Allow-Origin', '*');
	});
	Route::get('team', function (){											//团队信息
		$team = \App\Group::first()->toJson();
		return response($team, 200)->header('Access-Control-Allow-Origin', '*');
	});
	Route::resource('articles', 'index\ArticleController', ['only' => ['index', 'show']]);		//文章
	Route::resource('users', 'index\UserController', ['only' => ['index', 'show']]);			//成员
	Route::resource('tags', 'index\TagController', ['only' => ['index', 'show']]);				//标签
	Route::resource('comments', 'CommentController');											//评论
});


Auth::routes();

Route::get('/tgHome', 'HomeController@index')->name('home');				//后台入口

Route::get('/', function (){
	return redirect()->route('home');
});

