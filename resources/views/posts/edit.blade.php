@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modifier un article</div>
                <div class="card-body">
                    <form action="{{ route('posts.update', $post) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <input class="form-control" type="text" name="title" placeholder="title" value="{{ $post->title }}">
                        @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <br />
                        <button class="btn btn-primary" type="submit">Modifier l'article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
