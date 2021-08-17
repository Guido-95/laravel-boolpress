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
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
