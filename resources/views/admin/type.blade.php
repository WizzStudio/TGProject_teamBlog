@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>分类管理</h1>
@stop

@section('content')
    <div class="container">
        <label for="posts"><h3>分类管理</h3></label>
        <div id="posts" class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>名称</th>
                    <th>钉钉机器人</th>
                    <th>文章数</th>
                    <th>修改</th>
                    <th>删除</th>
                    <th>新建分类<i class="fa fa-fw fa-plus" style="color: #00c0ef"
                        data-toggle="modal" data-target="#add_form"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($types as $eachType)
                    <tr id="type{{ $eachType->id }}">
                        <th><a href="{{ route('type.show', ['id' =>$eachType->id]) }}">
                                {{ $eachType->l1_name }} - {{ $eachType->l2_name }}
                            </a>
                        </th>
                        <th>{{ $eachType->ding_hook }}</th>
                        <th>{{ $eachType->posts->count() }}</th>
                        <th><a href="{{ route('type.edit', ['id' => $eachType->id]) }}">
                                <i class="fa fa-fw fa-pencil" style="color: #00a65a"></i>
                            </a></th>
                        <th>
                            <i class="fa fa-fw fa-remove" id="{{ $eachType->id }} "
                                    style="color: #990000" onclick="type_remove(this.id)"></i>
                        </th>
                    </tr>
                @endforeach
                </tbody>
                {{ $types->links() }}
            </table>
        </div>
    </div>
    <div class="modal fade" id="add_form"
            tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">添加分类</h4>
                </div>
                <div class="modal-body">
                    <form id="type_add_form" class="form-horizontal"
                            role="form" action="{{ route('type.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <input class="form-control" name="l1_name" placeholder="一级名称">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="l2_name" placeholder="二级名称(创建一级分类时此项不填)">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="ding_hook" placeholder="钉钉机器人hook地址(可选)">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="desc" placeholder="描述(可选)">
                        </div>
                        <div class="form-group">
                            <button type="button" class="form-control btn-primary"
                                    onclick="type_add()">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function type_remove(id) {
            $.ajax({
                url:'{{ route('type.index') }}'+"/"+id,
                type:"DELETE",
                success:function (data) {
                    bootbox.alert("删除成功",function () {
                        $('#type'+id).remove();
                    })
                },
                error:function (e) {
                    bootbox.alert("删除失败");
                    console.log(e);
                }
            })
        }
        function type_update(id) {

        }
        function type_add() {
            $.ajax({
                url: "{{ route('type.store') }}",
                type: "POST",
                data: $("#type_add_form").serialize(),
                success: function (data) {
                    bootbox.alert("添加成功", function () {
                        window.location.reload();
                    })
                },
                error: function (e) {
                    bootbox.alert("添加失败");
                    console.log(e);
                }
            })
        }
    </script>
@endsection