@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mb-4">
            {{ session('message') }}
        </div>
    @endif 
    <form class="create-edit container " action="{{route('admin.posts.update' ,$post->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title',$post->title)}}">
            @error('title')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Descrizione</label>
            <textarea type="text" name="content"  class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Inserisci informazioni sull'articolo">{{old('content',$post->content)}}
            </textarea>
            @error('content')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
            
        </div>
        
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection