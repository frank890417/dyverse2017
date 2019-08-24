<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Work;
use App\Singer;

class WorkController extends Controller
{
    //
	function index(){
		$input = Input::all();
		$works = DB::table('works')
				->leftjoin("singers","works.singerid","=","singers.id");

		if (isset($input["type"])){
			$works= $works->where("singerid","!=","0");
		}
		$works= $works->select("works.*","singers.name as singer_name")->get();
		// dd($works);
		
		// dd($works);
		return view('work_manage')
              ->with('pagename','work')
							->with('works',$works)
							->with('filter',isset($input["type"])?$input["type"]:"");
	}

	function create(){
		$singers = Singer::all();
		return view('work_new')
              ->with('pagename','work')
							->with("singers",$singers );
	}

	function store(){
		$input = Input::all();
		$work = new Work;
		$work->save();
		$work->update($input);
		// dd($work);
		$work->save();
		return Redirect::to('/manage/work');
	}

	function edit($id){
		$singers = Singer::all();
		// $input = Input::all();
		$work = Work::find($id);
		return view('work_new')
            ->with('pagename','work')
						->with('work',$work)
						->with("singers",$singers );
	}

	function update($id){
		$input = Input::all();
		$work = Work::find($id);
		$work -> update($input);
		$work -> show =array_key_exists('show',$input)?true:false;
		$work -> save();
		return Redirect::to('/manage/work');
	}


	function destroy($id){
		// $input = Input::all();
		$work = Work::find($id);
		$work->delete();
		return Redirect::to('/manage/work');
	}
}
