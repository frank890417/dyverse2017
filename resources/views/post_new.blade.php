@extends('layouts.app_manage')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('post') }}">文章管理</a>
                </li>
               <!--  <li>
                    <a href="#">Link</a>
                </li> -->
                <li class="active">文章編輯</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">新增文章</div>

                <div class="panel-body">


                    @if (isset($post))
                    <form action="{{ url('post/'.$post->id) }}" method="post">
                        <input type="hidden" name="_method" value="put">
                    @else
                    <form action="{{ url('post/') }}" method="post">
                        <input type="hidden" name="_method" value="post">
                    @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <!-- <div class="col-sm-6">
                                <img src="" alt="">
                            </div> -->
                            <div class="col-md-10 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="title">文章標題</label>
                                    <input class='form-control' type="text" name="title" value="{{ isset($post)?$post->title:'' }}">
                                </div>
                                <div class="form-group">
                                    <label for="tag">文章標籤</label>
                                    <input class='form-control' type="text" name="tag" value="{{ isset($post)?$post->tag:'' }}">
                                </div>
                                <div class="form-group">
                                    <label for="author">撰文者</label>
                                    <input class='form-control' type="text" name="author" value="{{ isset($post)?$post->author:'' }}">
                                </div>

                                <div class="form-group">
                                    <label for="cover">封面圖片</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                          <img class='cover_preview' src='{!! isset($post)?$post->cover:"" !!}' width="100%">
                                        </div>
                                        <div class="col-sm-9">
                                          <input id=cover name=cover class='form-control' style='width: 80%; display: inline-block' value='{!! isset($post)?$post->cover:"" !!}'>
                                          <br>
                                          <div class="btn btn-default btn-md btn-dropzone-cover" style=' display: inline-block'>上傳圖片
                                          </div>
                                          
                                       
                                        </div>
                                    </div>

                                </div>
                                 <div class="form-group">
                                    <label for="established_time">文章日期</label>
                                    <input class='form-control' type="text" name="established_time" value="{{ isset($post)?$post->established_time:'' }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">摘要</label>
                                    <textarea class='form-control' type="text" name="description" value="" rows="5">{{ isset($post)?$post->description:'' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">文章內容</label>
                                    <textarea class='form-control' type="text" name="content" id='content' rows=15 >{{ isset($post)?$post->content:'' }}</textarea>
                                </div>

                            
                           
                              <!--   <div class="form-group">
                                    <label for="post">負責工作</label>
                                    <input class='form-control' type="text" name="post" value="{{ isset($post)?$post->post:'' }}">
                                </div>
                               
                                <div class="form-group">
                                    <label for="company">客戶</label>
                                    <input class='form-control' type="text" name="company" value="{{ isset($post)?$post->company:'' }}">
                                </div>
                                <div class="form-group">
                                    <label for="company_url">客戶網址</label>
                                    <input class='form-control' type="text" name="company_url" value="{{ isset($post)?$post->company_url:'' }}">
                                </div> -->
                            </div>
                        
                        </div>

                        
                        <div class="form-group">
                            @if (isset($post))
                                <button class="btn btn-primary" type="submit" >儲存修改</button>
                            @else
                               <button class="btn btn-primary" type="submit" >新增作品</button>
                            @endif
                                

                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('require_js')

  <script>

    window.require_js={};
    window.require_js.dropzone=true;
    window.require_js.tinymce=true;
    
  </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js'></script>
@endsection

