@extends('layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>

        By <a href="#">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}">
            {{ $post->category->name }}
        </a>

        <div>
            <p>
                {!! $post->body !!}
            </p>
        </div>
    </article>

    <a href="/">Go Back</a>
@endsection
