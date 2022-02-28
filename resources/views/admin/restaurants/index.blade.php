@extends('layouts.app')

@section('content')
@dump($ristoranti)
<div class="container">

  <div >
    @foreach ($ristoranti as $ristorante)
    <h1><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->id)}}">{{$ristorante->slug}}</a></h1>
    @endforeach
    <div><a href="{{route('admin.index')}}">Back <<</a></div>
  </div>
</div>      
@endsection
