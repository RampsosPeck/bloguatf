<?php

namespace Bloguatf\Http\Controllers;

use Bloguatf\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	//return $category->load('posts'); 
    	
    	//$posts = $category->posts; 

    	//return view('welcome', compact('posts'));

    	return view('welcome', [
    		'title' => "Publicaciones de la categoría {$category->name}",
    		'posts' => $category->posts()->paginate()
    		]);
    }


}
