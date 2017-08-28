<?php

Un Posts podra tener muchas Etiquetas y una Etiqueta podra tener muchos Post 

//Para crear el modelo con su migracion 
	$ php artisan make:model Post -m
//Para crear los seeders 
// 1)En seeders/DatabaseSeeder poner
		$this->call(PostsTableSeeder::class);
// 2)Crear el archivo 
	$ php artisan make:seeder PostTableSeeder
// En el archivo creado poner asi: el truncate sirve para limpiar todos los anteriores seeders
		Post::truncate();
	// Una forma de crear uno por uno es asi:
        $post = new Post;
        $post->title   = "Mi primer posts";
        $post->excerpt = "Extracto de mi primer Post";
        $post->body    = "<p>Contenido de mi primer post</p>";
        	// El->subDays(1); es para decir de se posteo hace 1 dia 
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id  = 1;
        $post->save();
	

//Si queremos llamar a una fecha normal de un campo de tipo date
// lo mostramos de la siguiente manera
		{{ $post->published_at->format('M d') }}

//Para volver  a ese campo de la instancia Carbon 
//para eso vamos al modelo y ponemos lo siguiente
	protected $dates = ['published_at'];

//Luego para ver a que hora realizó el post
	{{ $post->published_at->diffForHumans() }}

//Para la relación de 1 a MUCHOS 
// 1) En la tabla muchos (Posts) En cada posts vamos a almacenar el id de la 
// categoria para hacer referencia a el. 
    $table->unsignedInteger('category_id'); 
// 2) En el modelo de mucho (Post)
// Esta relación es de uno a muchos el Post tiene 
// una categoria   $post->categoria->name
    public function category($value='')
    {
    	return $this->belongsTo(Category::class);
    }

//Para la relacion de MUCHOS a MUCHOS
// creamos una tabla para almacenar el id del tag y otro para el id del Post
// no necesitamos un modelo
// 1) El nombre se pone pimero create_ nombres de las dos tablas en orden alfabetico y al final _table
    $ php artisan make:migration create_post_tag_table --create = post_tag
// 2)En el modelo de Post asemos la relación 
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

//PARA REFRESCAR EL AUTOLOADER
    $ composer dumpautoload







