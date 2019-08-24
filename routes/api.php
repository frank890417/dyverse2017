<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>['cors']] , function(){
	Route::get('work/indep',"ApiController@get_indep_works");
	Route::get('work/',"ApiController@get_all_works");
	Route::get('post/',"ApiController@get_all_posts");
	Route::get('singer/',"ApiController@get_all_singers");
	Route::get('members/',"ApiController@get_all_members");
	Route::get('singer/{id}/work',"ApiController@get_singer_work");
	Route::get('singer/{id}',"ApiController@get_singer");
});

Route::post("neteasemv","ApiController@get_netease_mv");
Route::get("neteasemv","ApiController@get_netease_mv");
Route::post("getbilibilimv","ApiController@get_bilibili_mv");
Route::get("getbilibilimv","ApiController@get_bilibili_mv");
Route::get("youtubemv/{id}","ApiController@get_youtube_info");
