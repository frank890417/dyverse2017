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
        $works=Work::where("singerid","=",$id)->get();
        $singer['works']=$works;
        
        return $singer;
    }

    public function get_all_works(){
        $works=Work::all();
        return $works;
    }

    public function get_all_singers(){
        $singers=Singer::all();
        foreach ($singers as $singer){
            $singer['works']=Work::where("singerid","=",$singer->id)->get();
        }
        return $singers;
    }

    public function get_all_posts(){
        $posts=Post::all();
        return $posts;
    }
}
