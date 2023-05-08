@extends('components/layout')
@section('content')
<!-- iterate over each element of the $posts array, assign its value to the $post on each iteration -->
    @foreach ($posts as $post) 
    
    <article>
        <h1>
            <a href="/posts/{{ $post->slug }}">
            {{ $post->title }}
            </a>
        </h1>
        <p>
        By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
        <div>
            {!! $post->excerpt !!}
        </div>
        
    </article>
    @endforeach
@endsection