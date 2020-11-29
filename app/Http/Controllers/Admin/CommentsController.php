<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\User;

class CommentsController extends Controller
{
	private $all_users = [];
	
    public function index() {

		foreach (User::all() as $key => $result) {
			$this->all_users[$result->id] = $result->name;
		}
				
		return view('admin.comments', [
			'comments' => Comment::all(), 
			'all_users' => $this->all_users
		]);
	}
	
	public function editcomment($id) {
		$comment = Comment::find($id); 
		return view('admin.editcomment', [
			'comment' => $comment
		]);
	}
	
	public function editcommentform(Request $req) {		
		$comment = Comment::find($req->input('id'));
		$comment->body = $req->input('body'); 
		$comment->public =$req->input('public'); 
		$comment->save();
		return redirect('admin/editcomment/' . $req->input('id'))->with('status', 'Данные успешно изменены!!!');		
	}
	
	public function deletecomment($id) {		
	
		$comment = Comment::find($id);
		$comment->delete();

		foreach (User::all() as $key => $result) {
			$this->all_users[$result->id] = $result->name;
		}
		return view('admin.comments', [
			'comments' => Comment::all(),
			'all_users' => $this->all_users, 
			'result' => 'Запись удалена!!!'
		]);
	}
	
}
