@extends('admin.layout')

@section('header')
	<h1>
        POSTS
        <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }} "><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index') }} "><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
    </ol>
@stop

@section('content')
<div class="row">
<form method="POST" action="{{ route('admin.posts.store') }} ">

	{{ csrf_field() }}

	<div class="col-md-8">
		<div class="box box-success">
				<div class="box-body">
					<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}} ">
						<label>Título de la publicación</label>
						<input name="title" 
							type="text"
							value="{{ old('title') }}" 
							placeholder="Ingresa aqui el título de la publicación" 
							class="form-control">
						{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}} ">
						<label>Contenido de la publicación</label>
						<textarea rows="10" id="editor" name="body" type="text" class="form-control" placeholder="Ingresa aqui el contenido de la publicación">{{ old('body') }}</textarea>
						{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="form-group">
                <label>Fecha de publicación:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="published_at" 
                  		class="form-control pull-right" 
                  		type="date" 
						value="{{ old('published_at') }}" 
                  		id="datepicker">
                </div>
                <!-- /.input group -->
            </div>

			<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
				<label>Categoria</label>
				<select name="category" class="form-control">
					<option value="">Seleccione una categoria</option>
					@foreach ($categories as $category)
						<option value="{{ $category->id }}" 
							{{ old('category') == $category->id ? 'selected' : '' }}>
							{{ $category->name }}</option>
					@endforeach
				</select>
				{!! $errors->first('category', '<span class="help-block">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
				<label>Etiquetas </label>
				<select name="tags[]" class="form-control select2" 
					data-placeholder="Selecciona una o más etiquetas" style="width: 100%;" multiple="multiple">
					@foreach ($tags as $tag)
						 <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }} </option>
					@endforeach
                </select>
                {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : ''}}">
				<label>Extracto de la publicación</label>
				<textarea name="excerpt" 
						class="form-control" 
						placeholder="Ingresa aqui el extracto de la publicación">{{ old('excerpt') }}
						</textarea>
				{!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block"> Guardar Publicación</button>
			</div>
		</div>
	</div>
</form>
</div>
@stop

@push('styles')
	<link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">  
	<link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush


@push('scripts')
	
	<script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
	<script src="/adminlte/plugins/select2/select2.full.min.js"></script>
	<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>

	<script>
	
		//Date picker
	    $('#datepicker').datepicker({
	      autoclose: true
	    });
	    $(".select2").select2();
	    CKEDITOR.replace('editor');		
	</script>

	


@endpush


