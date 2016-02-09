@extends ('layouts.app')

@section ('content')

	@include ('errors.list')

	{!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostsController@update', $post->id]]) !!}
		@include ('posts._form', ['submitButtonText' => 'Update Post'])
	{!! Form::close() !!}

@stop