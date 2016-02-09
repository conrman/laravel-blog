@extends ('layouts.app')

@section ('hero_text')
	<h1 class="app-hero__text">Write a new Post</h1>
@stop

@section ('content')
	@include ('errors.list')

	<div class="col-md-8 col-md-offset-2">
		{!! Form::model($post = new Blog\Post, ['url' => '/posts']) !!}
			@include ('posts._form', ['submitButtonText' => 'Add Post'])
		{!! Form::close() !!}
	</div>
@stop