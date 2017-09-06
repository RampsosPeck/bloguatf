<?php

namespace Bloguatf\Http\Controllers\Admin;
use Carbon\Carbon;
use Bloguatf\Tag;
use Bloguatf\Post;
use Bloguatf\Category;
use Illuminate\Http\Request;
use Bloguatf\Http\Controllers\Controller;
use Bloguatf\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
	protected $primaryKey = 'id';
    public function index()
    {
    	$posts = Post::all();

    	return view('admin.posts.index', compact('posts'));
    }

//    public function create()
//    {
//    	$categories = Category::all();
//    	$tags = Tag::all();

//    	return view('admin.posts.create', compact('categories','tags'));
//    }

    public function store(Request $request)
    {
        $this->validate($request, ['title'=>'required']);

        $post = Post::create($request->only('title'));

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories','tags','post'));

    }

//    public function store(Request $request)

    public function update(Post $post, StorePostRequest $request)
    {

/*

        //return $request->all();

       $this->validate($request, [
            'title'    => 'required',
            'body'     => 'required',
            'category' => 'required',
            'tags'     => 'required',
            'excerpt'  => 'required'
        ]);

*/
        
/*        $post->title    = $request->get('title');
//        $post->url      = str_slug($request->get('title'));
        $post->body     = $request->get('body');
        $post->iframe   = $request->get('iframe');
        $post->excerpt  = $request->get('excerpt');
*/
        $post->update($request->all());
 /*
        $post->published_at = $request->has('published_at') ? 
                        Carbon::parse($request->get('published_at')) : 
                        null;
 */
    //    $post->published_at = $request->get('published_at');

 /*
        $post->category_id  = Category::find($cat = $request->get('category'))
                                ? $cat
                                : Category::create(['name' => $cat])->id;
 */
      //  $post->category_id  = $request->get('category');
      //  $post->save();
 /*
        $tags = [];
        foreach ($request->get('tags') as $tag) 
        {
            $tags[] = Tag::find($tag)
                        ? $tag
                        : Tag::create(['name' => $tag])->id;
        }
 */
    /*
        $tags = collect($request->get('tags'))->map(function($tag){
           return  Tag::find($tag)
                        ? $tag
                        : Tag::create(['name' => $tag])->id;
        });

        //$post->tags()->sync($request->get('tags'));
        $post->tags()->sync($tags);
    */
        $post->syncTags($request->get('tags'));


        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada');
    }

}
