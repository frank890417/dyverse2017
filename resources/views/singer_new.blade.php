@extends('layouts.app_manage')

@section('content')

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/manage/singer') }}">創作者管理</a>
            </li>
           <!--  <li>
                <a href="#">Link</a>
            </li> -->
            <li class="active">創作者編輯</li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">新增創作者</div>

            <div class="panel-body">

                
                @if (isset($singer))
                <form action="{{ url('/manage/singer/'.$singer->id) }}" method="post">
                    <input type="hidden" name="_method" value="put">
                @else
                <form action="{{ url('/manage/singer/') }}" method="post">
                    <input type="hidden" name="_method" value="post">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <!-- <div class="col-sm-6">
                            <img src="" alt="">
                        </div> -->
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="name">名字</label>
                                <input class='form-control' type="text" name="name" value="{{ isset($singer)?$singer->name:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="description">描述</label>
                                <textarea class='form-control' id='content' type="text" name="description" rows=15 >{{ isset($singer)?$singer->description:'' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">粉專連結</label>
                                <input class='form-control' type="text" name="link" value="{{ isset($singer)?$singer->link:'' }}">
                            </div>
                            <label for="image">封面圖片連結</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                      <img class='cover_preview' src='{!! isset($singer)?$singer->cover:"" !!}' width="100%">
                                    </div>
                                    <div class="col-sm-9">
                                      <input id=cover name=cover class='form-control' style='width: 80%; display: inline-block' value='{!! isset($singer)?$singer->cover:"" !!}'>
                                      <br>
                                      <div class="btn btn-default btn-md btn-dropzone-cover" style=' display: inline-block'>上傳圖片
                                      </div>
                                      
                                        
                                    </div>
                                </div>
                        </div>
                    
                    </div>

                    
                    <div class="form-group">
                        @if (isset($singer))
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
