@extends ('layouts.app')

@section('content')
    @foreach ($posts as $post)
        <article class="post">
            <header class="post-header">
                <h2 class="post-header-title">
                    <a class="post-header-link" href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a>
                </h2>
                <div class="post-author">
                    <em>{{ $post->user['name'] }}</em>
                </div>
            </header>

            <br>

            <div class="post-body">
                {{ $post->body }}
            </div>

        </article>
    @endforeach
@endsection
