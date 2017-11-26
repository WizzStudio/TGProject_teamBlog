@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>管理员</h1>
@stop

@section('content')
    <div class="container">
        <label for="posts"><h3>标签管理</h3></label>
        <div id="posts" class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>标签</th>
                    <th>创建时间</th>
                    <th>文章数</th>
                    <th>删除</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $eachTag)
                    <tr id="tag{{ $eachTag->id }}">
                        <th><a href="{{ route('tag.show', ['id' =>$eachTag->id]) }}">
                                {{ $eachTag->name }}
                            </a>
                        </th>
                        <th>{{ $eachTag->created_at }}</th>
                        <th>{{ $eachTag->posts->count() }}</th>
                        <th>
                            <i class="fa fa-fw fa-remove" id="{{ $eachTag->id }} "
                                    style="color: #990000" onclick="tag_remove(this.id)"></i>
                        </th>
                    </tr>
                @endforeach
                </tbody>
                {{ $tags->links() }}
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
        function tag_remove(id) {
            $.ajax({
                url:'{{ route('tag.index') }}'+"/"+id,
                type:"DELETE",
                success:function (data) {
                    bootbox.alert("删除成功",function () {
                        $('#tag'+id).remove();
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