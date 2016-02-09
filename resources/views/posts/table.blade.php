<table class="table">
	<tr>
		<th>Name</th>
		<th>Author</th>
		<th>Tags</th>
		<th>Published</th>
		<th></th>
	</tr>
	@foreach ($posts as $post)
	<tr>
		<td>{{ $post->title }}</td>
		<td>{{ $post->user->name }}</td>
		<td>{{ $post->tags->lists('name') }}</td>
		<td>{{ $post->published_at }}</td>
		<td>
			<a class="btn btn-info btn-xs" href="{{ action('PostsController@edit', ['id' => $post->id]) }}">Edit</a>
			<a class="btn btn-danger btn-xs" href="{{ action('PostsController@destroy', ['id' => $post->id]) }}">Delete</a>
		</td>
	</tr>
	@endforeach
</table>