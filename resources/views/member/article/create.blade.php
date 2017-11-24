@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('editormd/css/editormd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('btv/css/bootstrapValidator.min.css') }}">
@endsection

@section('title', 'Admin')

@section('content_header')
    <h1>{{ env('Group_name', 'Group') }}&nbsp;--&nbsp;{{ $user }}</h1>
@stop

@section('content')
    <div class="container">
        <label for="posts"><h3>发布文章</h3></label>
        <div id="posts" class="row">
            <form class="form-horizontal" method="post"  id="post-form" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-8 col-lg-8">
                    <label for="title">文章标题</label>
                    <div class="row">
                        <div class="col-sm-8 col-md-8">
                            <input type="text" class="form-control" name="title" id="title" placeholder="文章标题">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8">
                    <label for="tag">文章标签</label>
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <input type="text" class="form-control" name="tag" id="tag" placeholder="文章标签" list="tag_list" onkeyup="get_tag(this.value)" >
                            <datalist id="tag_list">
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-10">
                    <label for="content">文章内容(markdown语法)</label>
                    <div class="row">
                        <div class="col-md-10 col-lg-10" id="editormd">
                            <textarea class="editormd-markdown-textarea" style="display:none;" id="content" name="content"></textarea>
                            <textarea style="display:none;"  name="html_content" id="html_content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button type="submit" {{--type="button" onclick="get_html_ajax()"--}} id="ajax" class="btn-lg btn-success">发布</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('editormd/editormd.min.js') }}"></script>
    <script src="{{ asset('btv/js/bootstrapValidator.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            editor = editormd("editormd", {
                path:"{{ asset('editormd/lib') }}"+"/",
                height: 800,
                syncScrolling: "single",
                toolbarAutoFixed: false,
                saveHTMLToTextarea: true,
            });
        });
        function get_tag(value)
        {
            $.ajax({
                url:"{{ route('search_tag') }}",
                type:"GET",
                data:"data="+value ,
                dataType:"json",
                success:function (data) {
                    for (var i=0 ;i<data.length;i++){
                        var tmp = $("<option></option>");
                        tmp.attr('value',data[i].name);
                        $("#tag_list").html(tmp);
                    }
                }
            })
        }
    </script>
@endsection