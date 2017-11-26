<?php

namespace App\Http\Controllers;

use App\Group;
use App\ImgService;
use App\Invite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$group = Group::all()->first();
		return view('admin.group', ['group' => $group]);
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
		$group = Group::findOrFail($id);
		if($request->hasFile('uploadfile')) {
			$imgService = new ImgService($request->file('uploadfile'));
			$filePath = $imgService->handle();
			if($filePath === false){
				return response("file illegal", 400);
			} else {
				if(!empty($group->url)) {
					$fileToUnlink = storage_path('app/public/'.explode('/',$user->url)[2]);
					unlink($fileToUnlink);
				}
				$group->url = Storage::url($filePath);
			}
		}
		$group->desc = $request->desc;
		$group->github = $request->github;
		$group->website = $request->website;
		if($group->save()) {
			return redirect()->route('group.index');
		} else{
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

    public function inviteCode()
	{
		$ret = "";
		for ($i=0;$i<10;$i++){
			$ret.=chr(mt_rand(65,127));
		}
		$ret = sha1($ret);
		$code = Invite::create([
			'code' => $ret,
		]);
		if($code){
			return response($ret,200);
		}else{
			return response("error",500);
		}
	}
}
