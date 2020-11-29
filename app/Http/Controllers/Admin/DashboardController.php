<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{	
	public function __construct() {
		return view('admin/comments');
	}
	
    public function dashboard(){
		return view('admin/head');
	}
}
