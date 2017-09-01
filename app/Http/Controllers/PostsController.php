<?php

namespace Bloguatf\Http\Controllers;

use Bloguatf\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {

    	//$post = Post::find($id);

    	return view('posts.show', compact('post'));
    }

}
