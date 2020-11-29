<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Likeusers;

class AjaxController extends Controller
{
     public function index(Request $request){
		$competition = Competition::find($request->id);
		$count_view = $competition->count_view;
		$competition->count_view = $count_view + 1;
		$competition->save();
	}
  
	public function setlike(Request $request){
		$data = Likeusers::where('user_id', '=', $request->user_id)->where('competition_id', '=', $request->id)->first();
		
		if ($data === null) {
			$likeusers = new Likeusers();
			$likeusers->user_id =$request->user_id;
			$likeusers->competition_id = $request->id;
			$likeusers->save();
			$competition = Competition::find($request->id);
			$count_likes = $competition->count_likes;
			$competition->count_likes = $count_likes + 1;
			$count_likes_ =$competition->count_likes;
			$competition->save();
		} else {
			$likeusers = Likeusers::find($data->id);
			$likeusers->delete();

			if ($likeusers) {
				$competition = Competition::find($request->id);
				$count_likes = $competition->count_likes;
				$competition->count_likes = $count_likes - 1;
				$count_likes_ =$competition->count_likes;
				$competition->save();
			}
		}
		return response()->json(array('count_likes'=> $count_likes_), 200);
  } 
}
