<?php
use Bloguatf\Post;
use Bloguatf\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Post::truncate();
        
        Category::truncate();
        
        $category = new Category;
        $category->name = "Categoria 1";
        $category->save();
        $category = new Category;
        $category->name = "Categoria 2";
        $category->save();
        $category = new Category;
        $category->name = "Categoria 1";
        $category->save();

        $post = new Post;
        $post->title   = "Mi primer posts";
        $post->url     = str_slug("Mi primer posts");
        $post->excerpt = "Extracto de mi primer Post";
        $post->body    = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id  = 2;
        $post->save();

        $post = new Post;
        $post->title   = "Mi segundo posts";
        $post->url     = str_slug("Mi segundo posts");
        $post->excerpt = "Extracto de mi segundo Post";
        $post->body    = "<p>Contenido de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id  = 1;
        $post->save();

        $post = new Post;
        $post->title   = "Mi tercero posts";
        $post->url     = str_slug("Mi tercero posts");
        $post->excerpt = "Extracto de mi tercero Post";
        $post->body    = "<p>Contenido de mi tercero p ost</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id  = 1;
        $post->save();

        $post = new Post;
        $post->title   = "Mi cuarto posts";
        $post->url     = str_slug("Mi cuarto posts");
        $post->excerpt = "Extracto de mi cuarto Post";
        $post->body    = "<p>Contenido de mi cuarto post</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id  = 1;
        $post->save();

    }
}
