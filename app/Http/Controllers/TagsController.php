<?php

namespace Bloguatf\Http\Controllers;

use Bloguatf\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
    	return view('welcome',[
    		'title'  => "Publicaciones de la etiqueta '{$tag->name}'", 
    		'posts'=> $tag->posts()->paginate(15)
    		]);
    }

}
