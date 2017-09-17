<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::latest()->get();
    	return view('posts.index', compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	/*$post = new Post;
    	$post['title'] = Request('title');
    	$post['body'] = Request('body');
    	$post->save();*/
    	$this->validate(request(), [
    		'title' => 'required | max: 10', 
    		'body' => 'required | min:10'
    	]);

    	Post::create(['title' => Request('title'), 'body' => Request('body')]);
    	return redirect('/');
    }
    public function show($id)
    {
    	$post = Post::find($id);
    	return view('posts.show', compact('post'));
    }
}
