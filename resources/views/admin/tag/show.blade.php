@extends('layouts.app')

@section('content')

    <div class="container">
        
        <h1> Tag : {{$tag->name}}</h1>
        <ul>
            @foreach ($tag->posts as $post)
            
                <li> <a href="{{route('admin.posts.show', $post->id)}}"> {{$post->title}} </a></li>
            @endforeach
    
        </ul> 
    </div>      
   
@endsection