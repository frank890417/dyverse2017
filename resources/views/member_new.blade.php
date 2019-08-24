@extends('layouts.app_manage')

@section('content')

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/manage/member') }}">成員管理</a>
            </li>
           <!--  <li>
                <a href="#">Link</a>
            </li> -->
            <li class="active">成員編輯</li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">新增成員</div>

            <div class="panel-body">

                
                @if (isset($member))
                <form action="{{ url('/manage/member/'.$member->id) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                @else
                <form action="{{ url('/manage/member/') }}" method="post">
                    <input type="hidden" name="_method" value="post">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <!-- <div class="col-sm-6">
                            <img src="" alt="">
                        </div> -->
                        <div class="col-md-4">

                            <label for="image">封面圖片</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <img class='cover_preview' src='{!! isset($member)?$member->cover:"" !!}' width="100%">
                                </div>
                                <div class="col-sm-6">
                                    <input id=cover name=cover class='form-control' style='width: 80%; display: inline-block' value='{!! isset($member)?$member->cover:"" !!}'>
                                    <br>
                                    <div class="btn btn-default btn-md btn-dropzone-cover" style=' display: inline-block'>上傳圖片
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="name">名字</label>
                                <input class='form-control' type="text" name="name" value="{{ isset($member)?$member->name:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="job">工作</label>
                                <input class='form-control' type="text" name="job" value="{{ isset($member)?$member->job:'' }}">
                            </div>
                            <br><br>
                            <br><br>

                            <div class="form-group">
                                @if (isset($member))
                                    <button class="btn btn-primary" type="submit" >儲存修改</button>
                                @else
                                <button class="btn btn-primary" type="submit" >新增作品</button>
                                @endif
                                    

                            </div>
                    
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="description">簡介</label>
                                <textarea class='form-control' id='content' type="text" name="description" rows=20 >{{ isset($member)?$member->description:'' }}</textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label for="link">粉專連結</label>
                                <input class='form-control' type="text" name="link" value="{{ isset($member)?$member->link:'' }}">
                            </div> -->
                        </div>
                    
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
    window.require_js.tinymce=false;
    
  </script>

    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js'></script> -->
@endsection
