@extends('layout')

@section('banner')
    <h1>
        My Blog
    </h1>
@endsection

@section('content')
    {{-- $posts is passed through the Route to be accessable. Ref #1 in routes/web.php--}}
    @foreach($posts as $post)
        <article>
            <a href="/posts/{{ $post->slug }}">
                <h1>{{ $post->title }}</h1>
            </a>

            <a href="#">
                {{ $post->category->name }}
            </a>
            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach
@endsection
