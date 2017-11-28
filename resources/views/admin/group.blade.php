@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>{{ env('Group_name', 'Group') }}</h1>
@stop

@section('content')
    <div class="conatiner">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form class="form-horizontal" role="form" method="post"
                    action="{{ route('group.update', ['id' => $group->id]) }}"
                    id="editor_setting" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label for="github">团队Github</label>
                    <input type="text" class="form-control" name="github" id="github"
                            value="{{ empty($group->github)?"":$group->github }}">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label for="website">团队主页</label>
                    <input type="text" class="form-control" name="website" id="website"
                            value="{{ empty($group->website)?"":$group->website }}">
                </div>
                <div class="col-sm-6 col-lg-6 col-md-6">
                    <label for="uploadfile">头像</label>
                    <input type="file" name="uploadfile" id="uploadfile"
                            class="file-loading form-control" />
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label for="desc">团队简介</label>
                    <textarea class="form-control" rows="10" name="desc" id="desc">
                        {{ empty($group->desc)?"":$group->desc }}
                    </textarea>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="col-sm-2 col-lg-2 col-md-2">
                        <button type="submit" class="btn-md btn-primary form-control">提交</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6"></div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <label for="link">友情链接</label>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-plus" style="color: #00a157" data-toggle="modal" data-target="#link_form"></i>
            <div class="modal fade" id="link_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">添加友链</h4>
                        </div>
                        <div class="modal-body">
                            <form id="link_add_form" class="form-horizontal" role="form" action="{{ route('link.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group ">
                                    <input class="form-control" name="name" placeholder="友链名称">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="href" placeholder="链接">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="form-control btn-primary"
                                            onclick="link_add()">提交</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
            <table class="table table-striped" id="link" >
                <thead>
                <tr>
                    <th>名称</th>
                    <th>删除</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $eachLink)
                    <tr id="{{ "link".$eachLink->id }}">
                        <th><a href="{{ $eachLink->href }}" target="_blank">{{ $eachLink->name }}</a></th>
                        <th><i class="fa fa-fw fa-remove" id="{{ $eachLink->id }} "
                                    style="color: #990000" onclick="link_remove(this.id)"></i></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/zh.js') }}"></script>
    <script type="text/javascript">
        $("#uploadfile").fileinput({
            language: 'zh', //设置语言
            uploadUrl: '', //上传的地址
            allowedFileExtensions: ['jpg', 'jpeg', 'png'],//接收的文件后缀
            uploadAsync: false, //默认异步上传
            showUpload: false, //是否显示上传按钮
            showRemove : true, //显示移除按钮
            showPreview : true, //是否显示预览
            showCaption: true, //是否显示标题
            browseClass: "btn btn-primary", //按钮样式
            dropZoneEnabled: false,//是否显示拖拽区域
            maxFileSize: 1024,//单位为kb，如果为0表示不限制文件大小
            maxFileCount: 1, //表示允许同时上传的最大文件个数
            validateInitialCount:true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function link_add() {
            $.ajax({
                url: "{{ route('link.store') }}",
                type: "POST",
                data: $("#link_add_form").serialize(),
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
        function link_remove(id) {
            $.ajax({
                url:'{{ route('link.index') }}'+"/"+id,
                type:"DELETE",
                success:function (data) {
                    $('#link'+id).remove();
                },
                error:function (e) {
                    bootbox.alert("删除失败");
                    console.log(e);
                }
            })
        }
    </script>
@endsection