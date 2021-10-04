@extends('layouts.app')

@section('content')
<h1 class="text-5xl">Blog</h1>
    @foreach ($posts as $post)
        <div class="p-6">
            <a href="{{ route('front.posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </div>
    @endforeach

@endsection