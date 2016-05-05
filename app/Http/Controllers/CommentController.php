<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function showComments($imageId){

    	$comments = Comment::find(1);
    	return view('comments.comment',['comments'=>$comments,'imageId'=>$imageId]);
    }
    public function addComment(Request $request,$imageId){
    	$comment = new Comment();
    	$comment->image_id = $imageId;
    	$comment->user_id = Auth::user()->id;

    	$users = users::where('id',Auth::user()->id)->first();
    	$comment->user_name =  $users->username;
    	$comment->comment=$request->input('comment');
    	$comment->save();

    	return redirect()->action('CommentController@showComments');
    }
}
