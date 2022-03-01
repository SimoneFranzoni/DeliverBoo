@extends('layouts.app')

@section('content')

<div class="container">

  @if (count($ristoranti)=== 0)
    <h1>Non hai ristoranti</h1>
    @else
    @foreach ($ristoranti as $ristorante)
    @dump($ristorante->name)
    <div >
      <h1><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">{{$ristorante->name}}</a></h1>
      <a href="{{route('admin.miei-ristoranti.edit', $ristorante)}}">EDIT</a><br/>
    </div>
    @endforeach
    <div><a href="{{route('admin.index')}}">Back <<</a></div>
    @endif

    <a href="{{route('admin.miei-ristoranti.create')}}">
      Aggiungi ristorante
    </a><br/>
    <a href="{{route('admin.index')}}">back <<</a>
    

    
    
  </div>      
@endsection
