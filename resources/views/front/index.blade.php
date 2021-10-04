@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1">
                @foreach ($posts as $post)
                    <div class="p-6">
                        <a href="{{ route('front.posts.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection