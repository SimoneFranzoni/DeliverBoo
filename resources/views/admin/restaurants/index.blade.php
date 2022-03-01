@extends('layouts.app')

@section('content')

<div class="container">

  <div >
    @foreach ($ristoranti as $ristorante)
    <h1><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">{{$ristorante->name}}</a></h1>
    @endforeach
    <div><a href="{{route('admin.index')}}">Back <<</a></div>
  </div>
</div>      
@endsection
