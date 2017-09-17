<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    //
    public function store($id)
    {
    	$this->validate(request(), [
    		'body' => 'required | min:4'
    	]);
    	Comment::create([
    		'body' => Request('body'), 
    		'post_id' => $id
    	]);
    	return back();
    }
}
