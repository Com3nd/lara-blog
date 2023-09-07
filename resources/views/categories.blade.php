@extends('layout')

@section('banner')
    <h1>
        My Blog Categories
    </h1>
@endsection

@section('content')
    {{-- $posts is passed through the Route to be accessable. Ref #1 in routes/web.php--}}
    @foreach($posts as $post)
        <article>
            <a href="/posts/{{ $post->slug }}">
                <h1>{{ $post->title }}</h1>
            </a>

{{--            <a href="categories/{{ $post->category->id }}">--}}
{{--                {{ $post->category->name }}--}}
{{--            </a>--}}
            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach
    <a href="/">Go Back</a>
@endsection
