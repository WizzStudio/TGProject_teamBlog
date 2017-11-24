@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>{{ env('Group_name', 'Group') }}&nbsp;--&nbsp;{{ $user }}</h1>
@stop

@section('content')
    <div class="container">
        <label for="posts"><h3>文章管理</h3></label>
        <div id="posts" class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>文章标题</th>
                        <th>标签</th>
                        <th>发布时间</th>
                        <th>浏览量</th>
                        <th>编辑</th>
                        <th>删除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $eachPost)

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection