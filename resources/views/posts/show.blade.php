@extends('layouts.app')

@section ('hero')
@overwrite


@section('content')
    @if (Auth::check())
        <div class="btn-group pull-right">
            <a href="{{ action('PostsController@edit', ['id' => $post->id]) }}" class="btn btn-link btn-icon">
                <i class="fa fa-edit"></i>
                Edit Post
            </a>
        </div>
    @endif

    <article class="post post-default">
        <header class="post-header">
            <h1 class="post-header__title">{{ $post->title }}</h1>
        </header>

        <div class="page-body">

            <div class="post-body">
                {{ $post->body }}
            </div>

            <footer class="post-footer">
                @unless ($post->tags->isEmpty())
                <div class="post-tags">
                    <h5 class="post-tags__title">
                        <span class="post-tags__title-text">
                            Tags:
                        </span>
                    </h5>
                    <ul class="post-tags__list list-inline">
                        @foreach ($post->tags as $tag)
                            <li class="badge">{{ $tag->name }}</li>                                    
                        @endforeach
                    </ul>
                </div>
                @endunless
            </footer>
        </div>
    </article>
@endsection
