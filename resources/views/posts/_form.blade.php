{{-- Post Title --}}
<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

{{-- Post Body --}}
<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

{{-- Publish Date --}}
<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', $post->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

{{-- Post Tags --}}
<div class="form-group">
	{!! Form::label('tag_list', 'Tags:') !!}
	{!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
	{{-- {{ $tags }} --}}
</div>

{{-- Submit --}}
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>

@section ('footer')
	<script>
		$('#tag_list').select2({
			placeholder: 'Choose a tag',
		});
	</script>
@endsection