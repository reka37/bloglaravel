<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Comment;
use App\User;

class AllController extends Controller
{
	const PAGINATION = 8;
	
    public function all()
    {
		$all = Competition::all();
		return view('head', [
			'data' => Competition::paginate(self::PAGINATION),
			'count_pagination' => (count($all)/self::PAGINATION)
		]);
    }
	
	public function category($menus)
    {
		$data = Competition::where('category_id', '=', $menus)->get();
		return view('head', [
			'data' => $data
		]);
    }
	
	public function one($id)
    {
		$all_users = [];
		foreach (User::all() as $key => $result) {
			$all_users[$result->id] = $result->name;
		}
		
		$comments = Comment::where('competition_id', '=', $id)->where('public', '=', '1')->get();		
		$data = Competition::find($id);
		return view('one', [
			'data' => $data,
			'comments' => $comments, 
			'all_users' => $all_users
		]);
    }
	
	public function search(Request $req)
    {
		$data = Competition::where('description', 'LIKE', '%' . $req->input('search') . '%')->get();
		$search = 'Результат поиска по слову: ' . $req->input('search');
		return view('head', [
			'data' => $data, 
			'result' => $search
		]);
    }
	
	public function show_one_autor($id)
    {	 
		$data = Competition::where('user_id', '=', $id)->get();
		return view('head', [
			'data' => $data
		]);
    }
}
