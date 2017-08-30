@extends('admin.layout')


@section('content')
	<h1>Dashboard Jorge</h1>
	<p> Te autentificaste: {{ auth()->user()->email }} </p>
@stop





