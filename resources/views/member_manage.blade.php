@extends('layouts.app_manage')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">成員管理</div>

                <div class="panel-body">
                    <table class='table table-hover' id=posttable>
                        <thead>
                            <th style="width: 150px">縮圖</th>
                            <th style="width: 150px">名稱</th>
                            <th style="width: 200px">工作</th>
                            <!-- <th>粉專連結</th> -->
                            <th>介紹</th>
                            <th style="width: 150px">編輯</th>
                            <th style="width: 150px">刪除</th>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                            <tr>
                                <td><img src="{{$member->cover}}" alt="" style="width: 80px"></td>
                                <td><a href="/manage/member/{{$member->id}}/edit">{{$member->name}}</a></td>
                                <td>{{$member->job}}</td>
                                <!-- <td><a href="{{$member->link}}" target="_blank">{{$member->link}}</a></td> -->
                               
                                <td>{!! nl2br($member->description) !!}</td>
                                <td><a class='btn btn-default' href="/manage/member/{{$member->id}}/edit">編輯</a></td>
                                <td>
                                  <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除作品嗎？")){document.getElementById("delete_post_{{$member->id}}").submit();}'>刪除</button>
                                  <form id='delete_post_{{$member->id}}' action="{{url('/manage/member/'.$member->id)}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  </form>
                                 
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('/manage/singer/create') }}" class="btn btn-primary">新增成員</a>
                </div>
            </div>
        </div>
    </div>
   

@endsection
