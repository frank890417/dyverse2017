@extends('layouts.app_manage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">演出者管理</div>

                <div class="panel-body">
                    <table class='table table-hover'>
                        <thead>
                            <th>縮圖</th>
                            <th style="width: 100px">名稱</th>
                            <th>粉專連結</th>
                            <th style="width: 300px">作品列表</th>
                            <th style="width: 300px">介紹</th>
                            <th>編輯</th>
                            <th>刪除</th>
                        </thead>
                        <tbody>
                            @foreach ($singers as $singer)
                            <tr>
                                <td><img src="{{$singer->cover}}" alt="" style="width: 80px"></td>
                                <td><a href="singer/{{$singer->id}}/edit">{{$singer->name}}</a></td>
                                <td><a href="{{$singer->link}}" target="_blank">{{$singer->link}}</a></td>
                                <td>
                                    <ul>
                                    @foreach ($singer->works as $work)
                                        <li><a href="{{ url('/work/'.($work->id).'/edit') }}">{{$work->title}}</a></li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>{!!$singer->description!!}</td>
                                <td><a class='btn btn-default' href="singer/{{$singer->id}}/edit">編輯</a></td>
                                <td>
                                  <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除作品嗎？")){document.getElementById("delete_post_{{$singer->id}}").submit();}'>刪除</button>
                                  <form id='delete_post_{{$singer->id}}' action="{{url('singer/'.$singer->id)}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  </form>
                                 
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('singer/create') }}" class="btn btn-primary">新增創作者</a>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection
