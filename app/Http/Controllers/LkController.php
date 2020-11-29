<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use Illuminate\Support\Facades\Storage;

use ImageUpload;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;


class LkController extends Controller
{
     public function submit(Request $req) {
		 
		if($req->hasFile('image')) {
			$file = $req->file('image');
			$imageFormat = $req->file('image')->extension();
			$img = md5(microtime() . rand(0, 9999)) . '.' .$imageFormat;
			$file->move(public_path() . '/images',$img);
		}

		$competition = new Competition();
		$competition->description = $req->input('description');
		$competition->user_id = Auth::user()->id;
		$competition->image = $img;

		$competition->save();
		return redirect()->route('lk');
	}
	
	public function index() {		  
		return view('lk', ['data' => Competition::all()]);
	}
	
	public function all(){
        return view('head');
    }
}
