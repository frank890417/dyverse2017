@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">作品管理</div>

                <div class="panel-body">
                    <table class='table table-hover'>
                        <thead>
                            <th>縮圖</th>
                            <th>名稱</th>
                            <th>日期</th>
                            <th>客戶</th>
                            <th>網址</th>
                            <th>編輯</th>
                            <th>刪除</th>
                        </thead>
                        <tbody>
                            @foreach ($singers as $singer)
                            <tr>
                                <td><img src="{{$singer->image}}" alt="" style="width: 80px"></td>
                                <td><a href="work/{{$singer->id}}/edit">{{$singer->title}}</a></td>
                                <td>{{$singer->date}}</td>
                                <td>{{$singer->company}}</td>
                                <td>{{$singer->work_url}}</td>
                                <td><a class='btn btn-default' href="work/{{$singer->id}}/edit">編輯</a></td>
                                <td>
                                  <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除作品嗎？")){document.getElementById("delete_post_{{$singer->id}}").submit();}'>刪除</button>
                                  <form id='delete_post_{{$singer->id}}' action="{{url('work/'.$singer->id)}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  </form>
                                 
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('work/create') }}" class="btn btn-primary">新增作品</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
