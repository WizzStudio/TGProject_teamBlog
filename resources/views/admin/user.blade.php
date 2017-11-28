@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>管理员</h1>
@stop

@section('content')
    <div class="container">
        <label for="posts"><h3>人员管理</h3></label>
        <button style="margin-left: 50px" class="btn-primary">生成邀请码</button>
        <div id="posts" class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>昵称</th>
                    <th>加入时间</th>
                    <th>文章数</th>
                    <th>设为管理员</th>
                    <th>删除</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $eachUser)
                    <tr id="user{{ $eachUser->id }}">
                        <th><a href="{{ route('member.show', ['id' =>$eachUser->id]) }}">
                                {{ $eachUser->name }}
                            </a>
                        </th>
                        <th>{{ $eachUser->created_at }}</th>
                        <th>{{ $eachUser->posts->count() }}</th>
                        <th id="admin{{ $eachUser->id }}">
                            <form class="form-horizontal" role="form"
                                    id="update_form_{{ $eachUser->id }}" method="post"
                                    action="{{ route('member.update', ['id' => $eachUser->id]) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $eachUser->id }}" name="user" id="user">
                                <button class="btn-success" type="button" id="{{ $eachUser->id }}"
                                        onclick="add_admin(this.id)">设置为管理员</button>
                            </form>
                        </th>
                        <th>
                            <i class="fa fa-fw fa-remove" id="{{ $eachUser->id }} "
                                    style="color: #990000" onclick="user_remove(this.id)"></i>
                        </th>
                    </tr>
                @endforeach
                </tbody>
                {{ $users->links() }}
            </table>
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
        function user_remove(id) {
            $.ajax({
                url:'{{ route('member.index') }}'+"/"+id,
                type:"DELETE",
                success:function (data) {
                    bootbox.alert("删除成功",function () {
                        $('#user'+id).remove();
                    })
                },
                error:function (e) {
                    bootbox.alert("删除失败");
                    console.log(e);
                }
            })
        }
        function add_admin(id) {
            $.ajax({
                url:'{{ route('member.index') }}'+"/"+id,
                type:"PUT",
                data:$('#admin'+id).serialize(),
                success:function (data) {
                    bootbox.alert("设置成功",function () {
                        $('#user'+id).remove();
                    })
                },
                error:function (e) {
                    bootbox.alert("删除失败");
                    console.log(e);
                }
            })
        }
    </script>
@endsection