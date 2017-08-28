<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    //Esta relación es de uno a muchos
    //el Post tiene una categoria   $post->categoria->name
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
}
