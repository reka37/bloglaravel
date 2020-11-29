<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Category;
use App\User;

class PublicationsController extends Controller
{
	public function index() {
		return view('admin.publications', [
			'publications' => Competition::all()
		]);
	}
	
	public function add() {
		return view('admin.addpublication', [
			'categories' => Category::all(), 
			'users' => User::all()
		]);
	}
	
	public function save(Request $req) {
		 
		if($req->hasFile('image')) {
			$file = $req->file('image');
			$imageFormat = $req->file('image')->extension();
			$img = md5(microtime() . rand(0, 9999)) . '.' .$imageFormat;
			$file->move(public_path() . '/images',$img);
		}

		$competition = new Competition();
		$competition->description = $req->input('description');
		$competition->category_id= $req->input('category');
		$competition->user_id= $req->input('user_id');
		$competition->image = $img;

		$competition->save();
		return redirect()->route('admin.addpublication');
	}
}
