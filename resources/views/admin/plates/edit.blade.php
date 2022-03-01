@extends('layouts.app')

@section('content')
<div class="container">

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{  $error }}</li>
          @endforeach
      </ul>
    </div>
  @endif


  <div class="row">
    <div class="col-6 offset-3">
 
      <h1>Modificare piatto : {{$piatto->name}}</h1>
      <form action="{{route('admin.miei-ristoranti.piatti.update',[$ristorante,$piatto])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input 
            class="form-control @error('name') is-invalid  @enderror" 
            type="text"  
            name="name" 
            id="name" 
            aria-describedby="emailHelp"
            value="{{old('name',$piatto->name)}}"
          >
          @error('name') 
            <p>{{$message}} </p>
          @enderror  
        </div>

        <div class="mb-3">
          <label for="ingrediants" class="form-label">Ingredienti</label>
          <input 
            type="text"  
            class="form-control @error('ingrediants') is-invalid  @enderror" 
            name="ingrediants" 
            id="ingrediants" 
            aria-describedby="emailHelp"
            value="{{old('ingrediants',$piatto->ingrediants)}}"
          >
          @error('ingrediants') 
            <p>{{$message}} </p>
          @enderror
        </div>

        <div class="form-group">
          <label for="description">Descrizione</label>
          <textarea class="form-control" class="form-control @error('description') is-invalid  @enderror" name="description" id="description" rows="3">{{old('description',$piatto->description)}}</textarea>
          @error('description') 
            <p>{{$message}} </p>
          @enderror
        </div>
       
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <input 
          type="decimal"  
          class="form-control @error('price') is-invalid  @enderror" 
          name="price" 
          id="price" 
          aria-describedby="emailHelp"
          value="{{old('price',$piatto->price)}}"
        >
        @error('price') 
          <p>{{$message}} </p>
        @enderror
        </div>

        <div>

          <select 
          name="category"
          id="category"
          class="form-control mb-5 @error('category') is-invalid  @enderror" >
            <option value="">Seleziona una categoria</option>
            @foreach ($categories as $category)
                
             <option 
             @if (  $category == old('category',$piatto->category)  ) selected @endif
             value="{{$category}}">{{$category}}</option>
            @endforeach
          </select>
          @error('category') 
            <p>{{$message}} </p>
          @enderror
        </div>
        
        <div class="form-check">
          <input class="form-check-input" type="radio" name="is_available" id="is_available" value="{{old('is_available',1)}}" @if($piatto->is_available==1) checked @endif>
          <label class="form-check-label" for="is_available">
            Disponibile
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="is_available" id="is_available" value="{{old('is_available',0)}}" @if($piatto->is_available==0) checked @endif>
          <label class="form-check-label" for="is_available">
            Non disponibile
          </label>
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">reset</button>
      </form>

    </div>
  </div>
<h3><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">Back <<</a></div>  
</div>
@endsection