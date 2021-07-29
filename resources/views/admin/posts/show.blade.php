@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mb-4">
        {{ session('message') }}
    </div>
    @endif

    {{-- @dd($post->category); --}}
    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success text-center my-5 d-inline-block mx-5">
    Modifica</a>

    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <button onClick="return confirm('Confermi la rimozione del post {{ $post->title }}?');" type="submit" class="btn btn-danger text-center my-5">
            Elimina</button>
    </form>
    

    <div class="container">
       
        <small class="text-center d-block">
            Id: {{$post->id}}
        </small>
    
        <h1 class="text-center">
            Titolo: {{$post->title}}
           
          
        </h1>  
        <div class="categories-tags text-center">
            @if ($post->category)
                <h3 class="d-inline-block">
                    <a href="{{route('admin.categories.show', $post->category->id)}}" class="badge badge-info">{{$post->category->name}}</a>
                </h3>
            @else
            
            @endif 

            @foreach ($post->tags as $tag)
                <h3 class="d-inline-block">
                    <a href="{{route('admin.tag.show', $tag->id)}}" class="badge badge-secondary">  {{$tag->name}} </a>
                </h3>
            @endforeach
        </div>
        <h2 class="text-center">
            Descrizione: {{$post->content}}
        </h2>
        <h4 class="text-center">
            Slug:{{$post->slug}}
        </h4>
    </div>
    
    
@endsection