<?php

namespace Bloguatf\Http\Controllers;

use Bloguatf\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {

		//$posts = Post::whereNotNull('published_at')
		//		->where('published_at','<=',Carbon::now() )
		//		->latest('published_at')
		//		->get();
		$posts = Post::published()->paginate(10);

    	return view('welcome', compact('posts'));
    }
}
