@extends('layouts.app')

@section('content')
    @foreach ($prova as $item)
    
        @if ($item->category)
            {{$item->category->name}}
        @endif
        
    @endforeach
@endsection