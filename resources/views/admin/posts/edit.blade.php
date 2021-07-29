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
        <div class="form-group">

            <label for="category_id">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value=""> -- Seleziona categoria -- </option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}"  

                        {{($item->id == old('category_id', $post->category->id)) ? 'selected' : ''}} 
                        >
                        
                        {{$item->name}} </option>
                    @endforeach
                    
            </select>
            @error('category_id')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <h5 for="category_id">Tag</h5>   
           
            @foreach ($tags as $tag)
          
                <div class="form-check d-inline-block mb-3 mr-4">
                    @if ($errors->any())
                        <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                        >
                        @else
                        <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                        {{ $post->tags->contains($tag->id) ? 'checked' : '' }}
                        > 
                    @endif
                    <label class="form-check-label" for="tag-{{$tag->id}}">
                        {{$tag->name}}
                    </label>
                </div>
            @endforeach
            @error('tags')   
                <div>
                    <small class="text-danger">{{ $message }}</small>
                </div>     
            @enderror
        </div>        
        
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection