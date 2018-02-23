@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>分类管理</h1>
@stop

@section('content')
    <div class="container">
        <label for="posts"><h3>分类管理</h3></label>
        <div id="posts" class="row">
            <form id="edit_form" class="form-horizontal" role="form"
                    method="post" action="{{ route('type.update', ['id' => $type->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-8 col-lg-8">
                    <div class="form-group">
                        <label for="l1_name">一级名称</label>
                        <input class="form-control" id="l1_name" name="l1_name" value="{{ $type->l1_name }}">
                    </div>
                    <div class="form-group">
                        <label for="l2_name">二级名称</label>
                        <input class="form-control" id="l2_name" name="l2_name" value="{{ $type->l2_name }}">
                    </div>
                    <div class="form-group">
                        <label for="ding_hook">钉钉hook地址</label>
                        <input class="form-control" id="ding_hook" name="ding_hook" value="{{ $type->ding_hook }}">
                    </div>
                    <div class="form-group">
                        <label for="desc">描述</label>
                        <input class="form-control" id="desc" name="desc" value="{{ $type->desc }}">
                    </div>
                    <div class="form-group">
                        <button class="btn-sm btn-primary" type="submit">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection