@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mb-4">
        {{ session('message') }}
    </div>
    @endif

    {{-- @dd($post->category); --}}
    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success text-center my-5">
    Modifica</a>
    <div class="container">

        <small class="text-center d-block">
            Id: {{$post->id}}
        </small>
    
        <h1 class="text-center">
            Titolo: {{$post->title}}
            @if ($post->category)
                {{-- <a href="{{route('admin.categories.show', $post->category->id)}}" class="badge badge-info">{{$post->category->name}}</a> --}}
                <span class="badge badge-info">{{$post->category->name}}</span>
            @else
                <span class="badge badge-info">Nessuna Categoria</span>
            @endif 
        </h1>  
        <h2 class="text-center">
            Descrizione: {{$post->content}}
        </h2>
        <h4 class="text-center">
            Slug:{{$post->slug}}
        </h4>
    </div>
    
    
@endsection