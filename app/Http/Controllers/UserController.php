<?php

namespace App\Http\Controllers;

use App\ImgService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$id = Auth::id();
		return redirect()->route('user.edit', ['id' => $id]);
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
		$user = User::findOrFail($id);
		return view('member.user', ['user' => $user]);
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
		if($request->hasFile('uploadfile')) {
			$imgService = new ImgService($request->file('uploadfile'));
			$filePath = $imgService->handle();
			if($filePath === false){
				return response("file illegal", 400);
			} else {
				if(!empty($user->url)) {
					$fileToUnlink = storage_path('app/public/'.explode('/',$user->url)[2]);
					unlink($fileToUnlink);
				}
				$user->url = Storage::url($filePath);
			}
		}
		$user->name = $request->name;
		$user->github = $request->github;
		$user->website = $request->website;
		$user->sign = $request->sign;
		$user->key_word = $request->key_word;
		if($user->save()) {
			return redirect()->route('user.edit', ['id' => $id]);
		} else {
			return response("error", 500);
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
    }
}
