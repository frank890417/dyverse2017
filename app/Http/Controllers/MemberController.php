<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Member;
use App\Work;
class MemberController extends Controller
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
        $members=Member::all();

        return view('member_manage')
              ->with('pagename','Member')
                ->with('members',$members);
    }

    function create(){
        return view('member_new')
              ->with('pagename','Member');
    }

    function store(){
        $input = Input::all();
        $member = Member::create($input);
        $member->save();
        return Redirect::to('/manage/member');
    }

    function edit($id){
        // $input = Input::all();
        $member = Member::find($id);
        return view('member_new')
              ->with('pagename','Member')
                ->with('member',$member);
    }

    function update($id){
        $input = Input::all();
        $member = Member::find($id);
        $member -> update($input);
        $member -> save();
        return Redirect::to('/manage/member');
    }

    function destroy($id){
        $member = Member::find($id);
        $member->delete();
        return Redirect::to('/manage/member');
    }
}
