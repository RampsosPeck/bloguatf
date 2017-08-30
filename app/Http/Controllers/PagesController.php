<?php

namespace Bloguatf\Http\Controllers;

use Bloguatf\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {

		$posts = Post::latest('published_at')->get();

    	return view('welcome', compact('posts'));
    }
}
