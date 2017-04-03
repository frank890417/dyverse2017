@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">作品管理 {{ $filter }}</div>

                <div class="panel-body">
                    <table class='table table-hover' id=posttable>
                        <thead>
                            <th>縮圖</th>
                            <th>名稱</th>
                            <th>日期</th>
                            <th>客戶</th>
                            <th>網址</th>
                            <th>演出者</th>
                            <th>編輯</th>
                            <th>刪除</th>

                        </thead>
                        <tbody>
                            @foreach ($works as $work)
                            <tr>
                                <td><img src="{{$work->image}}" alt="" style="width: 80px"></td>
                                <td><a href="work/{{$work->id}}/edit">{{$work->title}}</a></td>
                                <td>{{$work->date}}</td>
                                <td>{{$work->company}}</td>
                                <td><a href="{{$work->work_url}}" target="_blank">{{$work->work_url}}</a></td>
                                <td>{{$work->singer_name?$work->singer_name:'--'}}</td>

                                <td><a class='btn btn-default' href="work/{{$work->id}}/edit">編輯</a></td>
                                <td>
                                  <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除作品嗎？")){document.getElementById("delete_post_{{$work->id}}").submit();}'>刪除</button>
                                  <form id='delete_post_{{$work->id}}' action="{{url('work/'.$work->id)}}" method="post">
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



@section('require_js_after')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
@endsection
