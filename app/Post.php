<?php

namespace Bloguatf;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
        return 'url';
    }

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

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
                ->where('published_at', '<=', Carbon::now() )
                ->latest('published_at');
    }

}
