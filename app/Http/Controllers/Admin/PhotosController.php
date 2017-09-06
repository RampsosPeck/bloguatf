<?php

namespace Bloguatf\Http\Controllers\Admin;
use Bloguatf\Photo;
use Bloguatf\Post;
use Illuminate\Http\Request;
use Bloguatf\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class PhotosController extends Controller
{
    public function store(Post $post)
    {

    	$this->validate(request(), [
    		'photo' => 'required|image|max:2048'
		]);
/*
        $post->photos()->create([
            'url' => request()->file('photo')->store('posts','public'),
            ]);

*/

    	$photo = request()->file('photo')->store('public');

    	//$photo = request()->file('photo');

    	//$photoUrl = $photo->store('public');

    	Photo::create([
    		'url' => Storage::url($photo),
    		'post_id' => $post->id
    		]);


    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        $photoPath = str_replace('storage', 'public', $photo->url);

        Storage::delete($photoPath);

        return back()->with('flash', 'Foto Eliminada');
    }
}
