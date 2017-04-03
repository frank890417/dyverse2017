<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // 顯示所有文章
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();

        return view('post_manage')
              ->with('pagename','post')
              ->with('posts',$posts);
    }

    // 顯示單篇文章
    public function show($id)
    {
      $post= Post::find($id);

      return view('posts_show')
            ->with('pagename','post')
            ->with('title','文章編輯 - '.$post->title)
            ->with('post',$post);
    }

    //新增文章
    public function create()
    {
      return view('post_new')
            ->with('pagename','post')
          ->with('title','新增文章');
    }

    //儲存文章 
    public function store()
    {
      $input=Input::all();
      // $input['established_time']= date("Y-m-d H:i:s");
      $input['content']=$this->html_cleaner($input['content']) ;
      $post=Post::create($input);
      $post->save();
      return Redirect::to('post');
    }
  
    //進入編輯文章頁面
    public function edit($id)
    {
      $post=Post::find($id);
      return view('post_new')

            ->with('pagename','post')
            ->with('title','編輯-'.$post->title)
            ->with('post',$post);
    }

    public function html_cleaner($str){

      $re = '/style=\".*?\"/';
      $str = preg_replace($re, "", $str) ;
      $re = '/class=\".*?\"/';
      $str = preg_replace($re, "", $str) ;
      $re = '/align=\".*?\"/';
      $str = preg_replace($re, "", $str) ;
      $re = '/lang=\".*?\"/';
      $str = preg_replace($re, "", $str) ;

      $re = '/\<span class="author-p-.*?\"\>(.*?)\<\/span>/';
      preg_match_all($re, $str, $s_matches);
    
      $len=count($s_matches[0]);
      for($i=0;$i<$len;$i++){
          $str=str_replace($s_matches[0][$i],$s_matches[1][$i],$str);   
      }

      $re = '/\<div.*?\"\>(.*?)\<\/div>/';
      preg_match_all($re, $str, $s_matches);
    
      $len=count($s_matches[0]);
      for($i=0;$i<$len;$i++){
          $str=str_replace($s_matches[0][$i],$s_matches[1][$i],$str);   
      }

      return $str;

    }

    //更新文章資料
    public function update($id)
    {
      $input=Input::all();
      $post=Post::find($id);
      $input['content']=$this->html_cleaner($input['content']) ;
      $post->update($input);


      return Redirect::to('post');


    }

    //刪除文章
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return Redirect::to('post');
    }

    public function jsonall(){
        $post = Post::orderBy('id','desc')->get();
        return $post;
    }

}
