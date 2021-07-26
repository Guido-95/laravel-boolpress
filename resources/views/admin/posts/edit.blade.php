@extends('layouts.app')

@section('content')
    <form class="create-edit container" action="{{route('admin.posts.update' ,$post->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title',$post->title)}}">

        </div>
        <div class="form-group">
            <label for="content">Descrizione</label>
            <textarea type="text" name="content"  class="form-control" id="content" placeholder="Inserisci informazioni sull'articolo">{{old('content',$post->content)}}
            </textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection