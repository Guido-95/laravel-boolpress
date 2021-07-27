@extends('layouts.app')

@section('content')
    <form class="create-edit container" action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" placeholder="Inserisci il titolo">
            @error('title')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Descrizione</label>
            <textarea type="text" name="content"  class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Inserisci informazioni sull'articolo">{{old('content')}}</textarea>
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
                            {{($item->id == old('category_id')) ? 'selected' : ''}}
                        >
                           
                            {{$item->name}} </option>
                        @endforeach
                       
                </select>
                @error('category_id')        
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection