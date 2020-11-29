<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function submit(Request $req) {
		return $req->input('email');	
	}
	
	public function addcomment(Request $req) {		
		$comment = new Comment();
		$comment->body = $req->input('comment'); 
		$comment->user_id = Auth::user()->id;
		$comment->competition_id = $req->input('competition_id');
		$comment->save();
		return redirect('one/' . $req->input('competition_id'))->with('status', 'Сообщение отправлено на модерацию!!!');		
	}
}
