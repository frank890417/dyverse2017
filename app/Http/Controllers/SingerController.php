<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Singer;
use App\Work;
class SingerController extends Controller
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
    public function index()
    {
        $singers=Singer::all();

        foreach ($singers as $singer){

            $works=Work::where("singerid","=",$singer->id)->get();
            $singer["works"]=$works;
        }
        
        
        return view('singer_manage')
              ->with('pagename','singer')
                ->with('singers',$singers);
    }

    function create(){
        return view('singer_new')
              ->with('pagename','singer');
    }

    function store(){
        $input = Input::all();
        $singer = Singer::create($input);
        $singer->save();
        return Redirect::to('singer');
    }

    function edit($id){
        // $input = Input::all();
        $singer = Singer::find($id);
        return view('singer_new')
              ->with('pagename','singer')
                ->with('singer',$singer);
    }

    function update($id){
        $input = Input::all();
        $singer = Singer::find($id);
        $singer -> update($input);
        $singer -> save();
        return Redirect::to('/manage/singer');
    }

    function destroy($id){
        $singer = Singer::find($id);
        $singer->delete();
        return Redirect::to('/manage/singer');
    }
}
