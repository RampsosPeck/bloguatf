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

//PARA REALIZAR LAS OPCIONES QUE TRAE CADA COMANDO 
//PODEMOS EJECUTAR -h y luego el nombre del comando
    $ php artisan -h make:auth

//ESTO LLAMA A LA CLASE ERROR AGREGANDO UN CAMPO ROJO EN ERROR DE VALIDACIÓN
    {{ $errors->has('password') ? ' has-error' : '' }}

//LA FUNCION OLD LO QUE HACE ES QUE PERSISTA EN CASO DE QUE HAYA UN ERROR DE VALIDACIÓN
//PARA QUE NO TENGAMOS QUEVOLVER A ESCRIBIRLO 
//REQUIRED para que no nos permita enviar el campo vacio
//AUTOFOCUS para que el cursor se ubique en ese campo y tengan q escribir en ese campo imediatamente despues de cargar la pagina
     <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

//CREAR UN CONTROLADOR DENTRO DE UNA CARPETA
//con este comando se crea la carpeta Admin 
     php artisan make:controller Admin/PostsController

<!-- UN MIDDLEWARE ES SIMPLEMENTE UNA CLASE QUE INTERCEPTA UNA PETICIÓN HTTP LA
FILTRA Y DEVUELVE UNA RESPUESTA -->

//DIFERENCIA ENTRE @yield('') Y @stack('') 
//estos dos haceen lo mismo pero 
//El problema es que cuando incluimos muchos archivos el @yield('') se sobre escribe 
//En cambio con el @stack lo que ingresemos ahi ingresa uno debajo del otro
//independiente en que nivel estemos en la inclución del archivo
//En cambio @stack no sobre escribe los archivos que incluye ahi 
    @yield('')        @stack('styles') =>   @push('styles')    @endpush



////VALIDACIONES
///En el controlador antes de gardar
    $this->validate($request, [
            'title' => 'required'
            ]);
///Para mostrar el mensaje
    <div class="form-group {{ $errors->has('title') ? sitiene errores : no tiene errores}} ">

//Asi debugueamos
    dd($request->get('title'));

//Para ver si es false y true
    dd($request->has('title'));    

//TODO esto es como se valida pero la funcion
    value="{{ old('title') }}" //es para que si hay un error 
//al enviar un formulario lo escrito en el campo no se tenga que volver a escribir
//<input name="title" 
//        type="text"
//        value="{{ old('title') }}" 
//        placeholder="Ingresa aqui el título de la publicación" 
//        class="form-control">
//{!! $errors->first('title', '<span class="help-block">:message</span>') !!}

//EL EL TEXTAREA EN lugar de darle un atributo VALUE simplemente lo coloco asi
    <textarea rows="10" id="editor" name="body" type="text" class="form-control" placeholder="Ingresa aqui el contenido de la publicación">{{ old('body') }}</textarea>

//DEBUGUAR un array 
    <label>Etiquetas{{ var_dump(old('tags')) }} </label>
    



//