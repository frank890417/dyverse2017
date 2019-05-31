<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Singer;
use App\Work;
use App\Post;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_singer_work($id){
        $singer=Singer::find($id);
        $works=Work::where("singerid","=",$id)->get();
        return $works;
    }
    public function get_indep_works(){
        $works=Work::where("singerid","=","0")->get();
        return $works;
    }
    
    public function get_singer($id){
        $singer=Singer::find($id);
        $works=Work::where("singerid","=",$id)->orderBy('date','desc')->get();
        $singer['works']=$works;
        
        return $singer;
    }

    public function get_all_works(){
        $works=Work::orderBy('date','desc')->get();
        return $works;
    }

    public function get_all_singers(){
        $singers=Singer::all();
        foreach ($singers as $singer){
            $singer['works']=Work::where("singerid","=",$singer->id)->orderBy('date','desc')->get();
        }
        return $singers;
    }

    public function get_all_posts(){
        $posts=Post::all();
        return $posts;
    }

    public function get_youtube_info($id){
        $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$id);
        parse_str($content, $ytarr);
        return $ytarr;
    }

    public function get_netease_mv(Request $request){
        // $url = "http://music.163.com/mv?id=5597192&userid=556605107";
        $url = $request->input('url');
        $url = str_replace("/#/","/",$url);
        $url = str_replace("/m/","/",$url);
        $str = file_get_contents($url);
        $re = '/flashvars\".*?hurl\=.*?(http.*?mp4)/';
        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        // Print the entire match result
        $mp4url = urldecode($matches[0][1]);
      
        $re = '/coverImg=(http.*?jpg)/';
        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        // Print the entire match result
        $coverurl = urldecode($matches[0][1]);

        $re = '/flag_title1\".*?title=\"(.*?)\"/';
        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        // Print the entire match result
        $title = urldecode($matches[0][1]);


        // return $str;
        return [
            "title" => $title,
            'cover' => $coverurl."?param=600y400",
            'video' => $mp4url
        ];

    }


    public function get_bilibili_mv(Request $request){

       
        $url = $request->input('url');


        $re = '/video\/av(.*?)\//m';
        $str = $url;

        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

        // $url = str_replace("/m/","/",$url);
        $video_id = $matches[0][1];
        $api_url = "https://api.bilibili.com/x/web-interface/view?aid=".$video_id;
        $api_result = json_decode(file_get_contents($api_url ),true );
        $cover_url = $api_result['data']['pic'];
        file_get_contents($cover_url);
        $base64data = base64_encode(file_get_contents($cover_url));
        return [
            "title" =>  $api_result['data']['title'],
            'cover' =>  "data:image/png;base64, ".$base64data,
            'video' => "https://player.bilibili.com/player.html?aid=".$video_id
        ];
        // dd($api_result);
    }


    // public function transfer_bilibili_image(Request $request){

    //     $url = $request->input('url');


    //     $re = '/video\/av(.*?)\//m';
    //     $str = $url;

    //     preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

    //     // $url = str_replace("/m/","/",$url);
    //     $video_id = $matches[0][1];
    //     $api_url = "https://api.bilibili.com/x/web-interface/view?aid=".$video_id;
    //     $api_result = json_decode(file_get_contents($api_url ),true );
    //     $cover_url = $api_result['data']['pic'];
    //     return "hi";
    //     file_get_contents($cover_url);
    //     dd(file_get_contents($cover_url));
    //     // return [
    //     //     "title" =>  $api_result['data']['title'],
    //     //     'cover' =>  $cover_url,
    //     //     'video' => "https://player.bilibili.com/player.html?aid=".$video_id
    //     // ];
    //     // dd($api_result);
    // }
}
