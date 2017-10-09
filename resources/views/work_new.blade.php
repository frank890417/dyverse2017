@extends('layouts.app_manage')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/manage/work') }}">作品管理</a>
            </li>
           <!--  <li>
                <a href="#">Link</a>
            </li> -->
            <li class="active">作品編輯</li>
        </ol>
    </div>
</div>
<form  class='row' action="{{ isset($work)?url('/manage/work/'.$work->id):url('/manage/work/') }}" method="post">
<div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">新增作品</div>

            <div class="panel-body">
        
            <div class="form-group">
                <label for="image">作品圖片</label>
                <div class="row">
                    <div class="col-sm-12">
                        <img class='cover_preview' src='{!! isset($work)?$work->image:"" !!}' width="100%">
                    </div>
                    <div class="col-sm-12">
                        <input id=cover name=image class='form-control' style='width: 80%; display: inline-block' value='{!! isset($work)?$work->image:"" !!}'>
                        <br>
                        <div class="btn btn-default btn-md btn-dropzone-cover" style=' display: inline-block'>上傳圖片
                        </div>
                        
                        <div class="btn btn-default btn-md btn_yt_thumb" style=' display: inline-block'>擷取youtube縮圖
                        </div><br>
                        
                    </div>
                </div>

            </div>
                <div class="form-group">
                <label for="date">作品日期</label>
                <input class='form-control' type="text" name="date" value="{{ isset($work)?$work->date:'' }}">
            </div>

            
            
                <div class="form-group">
                    <label for="work">負責工作</label>
                    <input class='form-control' type="text" name="work" value="{{ isset($work)?$work->work:'' }}">
                </div>
                
                <div class="form-group">
                    <label for="company">客戶</label>
                    <input class='form-control' type="text" name="company" value="{{ isset($work)?$work->company:'' }}">
                </div>
                <div class="form-group">
                    <label for="company_url">客戶網址</label>
                    <input class='form-control' type="text" name="company_url" value="{{ isset($work)?$work->company_url:'' }}">
                </div>
                <div class="form-group">
                    <label for="credit">Contributer</label>
                    <textarea class='form-control' type="text" name="credit" rows=8 >{{ isset($work)?$work->credit:'' }}</textarea>
                </div>
            

                <hr>
                <div class="form-group">
                    @if (isset($work))
                        <button class="btn btn-danger" type="submit" >儲存修改</button>
                    @else
                        <button class="btn btn-danger" type="submit" >新增作品</button>
                    @endif
                        

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading">作品資訊</div>

            <div class="panel-body">
                <input type="hidden" name="_method" value="{{ isset($work)?'put':'post' }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                <div class="form-group">
                    <label for="title">作品標題</label>
                    <input class='form-control' type="text" name="title" value="{{ isset($work)?$work->title:'' }}">
                </div>
                <div class="form-group">
                    <label for="work_url">作品連結(soundcloud album 或 youtube)</label>
                    <input class='form-control' type="text" name="work_url" value="{{ isset($work)?$work->work_url:'' }}">
                </div>
                <div class="form-group">
                    <label for="singerid">合作演出者</label>
                    <select class='form-control' name="singerid">
                        <option value="0" {{ isset($work)?($work->singerid==0?'selected':''):'' }} >--</option>
                        @foreach ($singers as $singer)
                            <option value="{{$singer->id}}" {{ isset($work)?($work->singerid==$singer->id?'selected':''):'' }}>{{$singer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="discription">作品描述</label>
                    <textarea class='form-control' type="text" name="discription" id='content' rows=10 >{{ isset($work)?$work->discription:'' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="mv">相關影音</label>
                    <textarea class='form-control' type="hidden" style="display: none;" name="mv" id='content' rows=10 :value="JSON.stringify(mvdata)" type="hidden"></textarea>
                    <ul v-if="mvdata" class='list-group'>
                        <li v-for="(mv,mvid) in mvdata" class='list-group-item'>
                            <div class="form-group">
                                <h4 v-if="mv.name!=''">@{{mvid+1}}. @{{mv.name}}
                                    <div class="btn btn-danger" @click="mvdata.splice(mvid,1)"> - </div>
                                </h4>
                                <h4 v-else>@{{mvid+1}}. 自動抓取
                                    <div class="btn btn-danger" @click="mvdata.splice(mvid,1)"> - </div>
                                </h4>
                            </div>

                            <div class="form-group-inline row">
                                <label class='col-sm-3' for="名稱">名稱</label>
                                <div class="col-sm-9">
                                    <input class='form-control' type="text" v-model="mvdata[mvid].name">
                                </div> 
                                
                            </div>

                            <div class="form-group-inline row">
                                <label class='col-sm-3' for="網址">網址</label>
                                <div class="col-sm-9">
                                    <picture_loader v-model="mvdata[mvid].url"></picture_loader>
                                    <input class='form-control' type="text" v-model="mvdata[mvid].url" @input="value => {mvdata[mvid].url=value}">
                                </div> 
                            </div>
                        </li>
                        <li>
                            <br>
                            <div class="btn btn-primary" @click="mvdata.push({name: '',url:''})"> + 新增MV </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </div>
</form>

@endsection
@section('require_js')

  <script>

    window.require_js={};
    window.require_js.dropzone=true;
    window.require_js.tinymce=true;
    window.mvdata = {!! $work->mv?$work->mv:"[]" !!};

    
  </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js'></script>
@endsection

