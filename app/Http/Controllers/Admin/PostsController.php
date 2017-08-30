<?php

namespace Bloguatf\Http\Controllers\Admin;
use Carbon\Carbon;
use Bloguatf\Tag;
use Bloguatf\Post;
use Bloguatf\Category;
use Illuminate\Http\Request;
use Bloguatf\Http\Controllers\Controller;

class PostsController extends Controller
{
	protected $primaryKey = 'id';
    public function index()
    {
    	$posts = Post::all();

    	return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
    	$categories = Category::all();
    	$tags = Tag::all();

    	return view('admin.posts.create', compact('categories','tags'));
    }
    public function store(Request $request)
    {

    	//dd($request);
    	$post = new Post;
    	$post->title  = $request->get('title');
    	$post->body  = $request->get('body');
    	$post->excerpt  = $request->get('excerpt');
    	$post->published_at  = Carbon::parse($request->get('published_at'));
    	$post->categories  = $request->get('category');
    	$post->save();
    }

}
