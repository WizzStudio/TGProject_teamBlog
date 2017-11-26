@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('editormd/css/editormd.min.css') }}">
    <link rel="stylesheet" href="{{ asset('btv/css/bootstrapValidator.min.css') }}">
@endsection

@section('title', 'Admin')


@section('content')
    <div class="container">
        <label for="posts"><h3>{{ $post->name }}</h3></label>
        <div id="posts" class="row">
            <form class="form-horizontal" method="post" action="{{ route('article.update', ['id' => $post->id]) }}" id="post-form" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-8 col-lg-8">
                    <label for="title">文章标题</label>
                    <div class="row">
                        <div class="col-sm-8 col-md-8">
                            <input type="text" class="form-control"
                                    name="name" id="name" placeholder="文章标题" value="{{ $post->name }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8">
                    <label for="tag">文章标签</label>
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <input type="text" class="form-control"
                                    name="tag" id="tag" placeholder="文章标签"  value="{{ $post->tag->name }}"
                                    list="tag_list" onkeyup="get_tag(this.value)" >
                            <datalist id="tag_list">
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-10">
                    <label for="content">文章内容(markdown语法)</label>
                    <div class="row">
                        <div class="col-md-10 col-lg-10" id="editormd">
                            <textarea class="editormd-markdown-textarea" style="display:none;"
                                    id="content" name="content">{{ $post->md_content }}</textarea>
                            <textarea style="display:none;"  name="html_content" id="html_content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button type="submit" {{--type="button" onclick="get_html_ajax()"--}} id="ajax" class="btn-lg btn-success">更新</button>
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
        $("#post-form").bootstrapValidator({
            message: '这个值没有被验证',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields:{
                title:{
                    validators:{
                        notEmpty:{
                            message:"文章题目不能为空"
                        }
                    }
                },
                tag:{
                    validators:{
                        notEmpty:{
                            message:"文章标签不能为空"
                        }
                    }
                }
            }
        });
    </script>
@endsection