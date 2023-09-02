@extends('layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>

        <a href="#">
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
