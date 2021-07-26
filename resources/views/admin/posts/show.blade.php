@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mb-4">
        {{ session('message') }}
    </div>
    @endif
    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success text-center my-5">
    Modifica</a>
    <div class="container">

        <small class="text-center d-block">
            Id: {{$post->id}}
        </small>
    
        <h1 class="text-center">
            Titolo: {{$post->title}}
        </h1>  
    
        <h2 class="text-center">
            Descrizione: {{$post->content}}
        </h2>
        <h4 class="text-center">
            Slug:{{$post->slug}}
        </h4>
    </div>
    
    
@endsection