@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>{{ env('Group_name', 'Group') }}&nbsp;--&nbsp;{{ $user->name }}</h1>
@stop

@section('content')
    <div class="conatiner">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <form class="form-horizontal" role="form" method="post"
                    action="{{ route('user.update', ['id' => $user->id]) }}"
                    id="editor_setting" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label for="name">昵称</label>
                    <input type="text" class="form-control" name="name" id="name"
                            value="{{ $user->name}}">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label for="github">Github</label>
                    <input type="text" class="form-control" name="github" id="github"
                            value="{{ empty($user->github)?"":$user->github }}">
                </div>
                <div class="col-sm-6 col-lg-6 col-md-6">
                    <label for="uploadfile">头像</label>
                    <input type="file" name="uploadfile" id="uploadfile"
                            class="file-loading form-control" />
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label for="website">个人主页</label>
                    <input type="text" class="form-control" name="website" id="website"
                            value="{{ empty($user->website)?"":$user->website }}">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label for="sign">个性签名</label>
                    <input type="text" class="form-control" name="sign" id="sign"
                            value="{{ empty($user->sign)?"":$user->sign }}">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label for="sign">关键词</label>
                    <input type="text" class="form-control" name="key_word" id="key_word"
                            value="{{ empty($user->key_word)?"":$user->key_word }}">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="col-sm-2 col-lg-2 col-md-2">
                        <button type="submit" class="btn-md btn-primary form-control">提交</button>
                    </div>
                </div>
            </form>
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
@endsection