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
                <div class="card-header">Liste des articles</div>

                <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <td>ID</td>
                               <td>Titre</td>
                               <td>Créé le</td>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach ($posts as $post)
                               <tr>
                                   <td>{{ $post->id }}</td>
                                   <td>{{ $post->title }}</td>
                                   <td>{{ $post->created_at }}</td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
