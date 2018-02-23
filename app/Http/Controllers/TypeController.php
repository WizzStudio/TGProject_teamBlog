<?php

namespace App\Http\Controllers;

use App\Post;
use App\Type;
use Illuminate\Http\Request;

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
		$types = Type::orderby('id', 'desc')->paginate(12);
		return view('admin.type', ['types' => $types]);
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
		$l1_name = trim($request->l1_name);
		$l2_name = trim($request->l2_name);
		$ding_hook = trim($request->ding_hook);
		$desc = trim($request->desc);
		if (empty($l2_name)) {
			$judge = Type::where('l1_name', null)->where('l2_name', $l1_name)->limit(1)->get();
			if ($judge->isNotEmpty()) {
				return response('已存在此一级分类', 400);
			}
			$type = Type::create([
				'p_id' => null,
				'l1_name' => null,
				'l2_name' => $l1_name,
				'ding_hook' => $ding_hook,
				'desc' => $desc,
			]);
			if (!$type) {
				return response($l1_name, 500);
			} else {
				return response('ok', 200);
			}
		}
		$parent = Type::where('l1_name', null)->where('l2_name', $l1_name)->limit(1)->get()->toArray();
		if (empty($parent)) {
			return response("无此一级分类", 400);
		}
		$pid = $parent[0]['id'] ?? null;
		$l1_name = $parent[0]['l2_name'] ?? $l1_name;
		$type = Type::create([
			'p_id' => $pid,
			'l1_name' => $l1_name,
			'l2_name' => $l2_name,
			'ding_hook' => $ding_hook,
			'desc' => $desc
		]);
		if (!$type) {
			return response('error', 500);
		} else {
			return response('ok', 200);
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
		$type = Type::findOrFail($id);
		$posts = Post::where('type_id', $id)->paginate(12);
		if (empty($type->l1_name)) {		//一级标签,显示其子标签
			$types = Type::where('p_id', $id)->paginate(12);
			return view('admin.type', ['types' => $types]);
		} else {
			return view('admin.post', ['posts' => $posts]);
		}
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
		$type = Type::findOrFail($id);
		return view('admin.type_edit', ['type' => $type]);
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
		$type = Type::findOrFail($id);
		$type->l1_name = trim($request->l1_name);
		$type->l2_name = trim($request->l2_name);
		$type->ding_hook = trim($request->ding_hook);
		$type->desc = trim($request->desc);
		if ($type->save()) {
			return redirect(route('type.index'));
		} else {
			return response('error', 500);
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
		$type = Type::findOrFail($id);
		if ($type->delete()) {
			return response('ok', 200);
		} else {
			return response('error', 500);
		}
    }
}
