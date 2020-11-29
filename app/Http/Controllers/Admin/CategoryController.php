<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
		return view('admin.catalog', [
			'categories' => Category::all()
		]);
	}
	
	public function add() {
		return view('admin.addcatalog');
	}
	
	public function save(Request $req) {
	
		$competition = new Category();
		$competition->name = $req->input('name');		
		$competition->save();
		return redirect()->route('admin.category');	
	}
}
