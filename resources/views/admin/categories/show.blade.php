@extends('layouts.app')
{{-- @dump($category->posts) --}}
@section('content')

    <div class="container">
        
        <h1>Categoria :  {{$category->name}}</h1>
        <ul>
            @forelse ($category->posts as $post)
            
                <li> <a href="{{route('admin.posts.show', $post->id)}}"> {{$post->title}} </a></li>
            @empty
                <li>
                    <h2>Nessun post in questa categoria</h2>
                </li>
               
            @endforelse 
    
        </ul> 
    </div>      
   
@endsection