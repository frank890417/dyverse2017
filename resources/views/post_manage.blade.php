@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">文章管理</div>

                <div class="panel-body">
                    <table class='table table-hover' id=posttable>
                        <thead>
                            <th>縮圖</th>
                            <th>名稱</th>
                            <th>日期</th>
                            <th>類別</th>
                            <th>摘要</th>
                            <th>撰文</th>
                            <!-- <th></th> -->
                            <!-- <th>演出者</th> -->
                            <th>編輯</th>
                            <th>刪除</th>

                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td><img src="{{$post->cover}}" alt="" style="width: 80px"></td>
                                <td><a href="post/{{$post->id}}/edit">{{$post->title}}</a></td>
                                <td>{{$post->established_time}}</td>
                                <td>{{$post->tag}}</td>

                                <td>{{ $post->description }}</td>
                                <td>{{$post->author?$post->author:'--'}}</td>

                                <td><a class='btn btn-default' href="post/{{$post->id}}/edit">編輯</a></td>
                                <td>
                                  <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除作品嗎？")){document.getElementById("delete_post_{{$post->id}}").submit();}'>刪除</button>
                                  <form id='delete_post_{{$post->id}}' action="{{url('post/'.$post->id)}}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  </form>
                                 
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('post/create') }}" class="btn btn-primary">新增文章</a>
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
