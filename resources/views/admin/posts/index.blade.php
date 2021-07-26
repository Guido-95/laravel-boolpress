@extends('layouts.app')

@section('content')
    
        @if (session('deleted'))
            <div class="alert alert-success"><strong>{{ session('deleted') }}</strong> eliminato correttamente!</div>
        @endif
    <div class="container">
        <h1 class="my-4">Elenco Articoli</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titolo</th>
                    <th>Slug</th>
                    <th colspan="3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td > <a href="{{route ('admin.posts.show', $item->id)}}" class="btn btn-primary"> SHOW </a></td>
                        <td><a href="{{route ('admin.posts.edit', $item->id)}}" class="btn btn-success">EDIT</a> </td>
                        <td >
                            <form action=
                            "{{route ('admin.posts.destroy', $item->id)}}" 
                            method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" onClick="return confirm('Confermi la rimozione del post {{ $item->title }}?');" class="btn btn-danger">DELETE</button> </td>
                        </form>
                           
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
