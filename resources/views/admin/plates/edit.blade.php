
@extends('layouts.app')

@section('content')
<div class="container">
 
  
  
  <div class="row">
    <div class="col-6 offset-3">
      
      <h1>Modifica piatto</h1>
      <form action="{{route('admin.miei-ristoranti.piatti.update',[$ristorante,$piatto])}}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input 
            class="form-control" 
            type="text"  
            name="name" 
            id="name" 
            aria-describedby="emailHelp"
            value="{{old('name',$piatto->name)}}"
          >
        </div>

        <div class="mb-3">
          <label for="ingrediants" class="form-label">Ingredienti</label>
          <input 
            class="form-control" 
            type="text"  
            name="ingrediants" 
            id="ingrediants" 
            aria-describedby="emailHelp"
            value="{{old('ingrediants',$piatto->ingrediants)}}"
          >
        </div>

          <div class="form-group">
          <label for="content">Descrizione</label>
          <textarea class="form-control" class="form-control" name="content" id="content" rows="3">{{old('description',$piatto->description)}}</textarea>
        </div>  
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">reset</button>
      </form>

    </div>
  </div>
<h3><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">Back <<</a></div>  
</div>

@endsection