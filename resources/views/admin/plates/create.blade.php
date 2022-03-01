@extends('layouts.app')

@section('content')
<div class="container">
  
  
  
  <div class="row">
    <div class="col-6 offset-3">
 
      <h1>Nuovo piatto</h1>
      <form action="{{route('admin.miei-ristoranti.piatti.store',$ristorante)}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Nome</label>
          <input 
            type="text"  
            class="form-control " 
            name="name" 
            id="name" 
            aria-describedby="emailHelp"
            value="{{old('name')}}"
          >
        </div>

        <div class="mb-3">
          <label for="title" class="form-label">Ingredienti</label>
          <input 
            type="text"  
            class="form-control " 
            name="ingrediants" 
            id="ingrediants" 
            aria-describedby="emailHelp"
            value="{{old('ingrediants')}}"
          >
        </div>

        <div class="form-group">
          <label for="description">Descrizione</label>
          <textarea class="form-control" class="form-control" name="description" id="description" rows="3">{{old('description')}}</textarea>
 
        </div>
       
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <input type="text" class="form-control" aria-label="Amount (to the nearest euro)">
        </div>
    
     
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">reset</button>
      </form>

    </div>
  </div>
<h3><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">Back <<</a></div>  
</div>
@endsection