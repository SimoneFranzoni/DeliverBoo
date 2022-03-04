@extends('admin.home')

@section('dashboard-content')
<div class="container">
 
 
  <div class="row">
    <div class="col-6 offset-3 offset-lg-0">
 
      <h1>Nuovo piatto</h1>
      <form action="{{route('admin.miei-ristoranti.piatti.store',$ristorante)}}"
      enctype="multipart/form-data"
      method="POST">
        @csrf
           {{-- nome piatto --}}
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input 
            type="text"  
            class="form-control @error('name') is-invalid  @enderror" 
            name="name" 
            id="name" 
            aria-describedby="emailHelp"
            value="{{old('name')}}"
          >
          {{-- messaggio di errore  --}}
        </div>
        @error('name') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror  
        
        {{-- ingredienti piatto --}}
        <div class="mb-3">
          <label for="ingrediants" class="form-label">Ingredienti</label>
          <input 
            type="text"  
            class="form-control @error('ingrediants') is-invalid  @enderror" 
            name="ingrediants" 
            id="ingrediants" 
            aria-describedby="emailHelp"
            value="{{old('ingrediants')}}"
          >
        </div>
          {{-- messaggio di errore  --}}
        @error('ingrediants') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror  
        

         {{-- descrizione piatto --}}
        <div class="form-group">
          <label for="description">Descrizione</label>
          <textarea  class="form-control @error('description') is-invalid  @enderror" name="description" id="description" rows="3">{{old('description')}}</textarea>
        </div>
        {{-- messaggio di errore  --}}
        @error('description') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror
       
        {{-- prezzo piatto --}}
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">€</span>
          </div>
          <input 
          type="decimal"  
          class="form-control  @error('price') is-invalid  @enderror" 
          name="price" 
          id="price" 
          aria-describedby="emailHelp"
          value="{{old('price')}}"
          >
        </div>
         {{-- messaggio di errore  --}}
        @error('price') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror

        {{-- select per categorie piatti(primo ,secondo etc...) --}}
        <div>
          <select 
          name="category"
          id="category"
          class="form-control mb-3 @error('category') is-invalid  @enderror" >
            <option value="">Seleziona una categoria</option>
            @foreach ($categories as $category)
                
            <option 
            @if (  $category == old('category')  ) selected @endif
            value="{{$category}}">{{$category}}</option>
            @endforeach
          </select mb-3>
        </div>
        {{-- messaggio di errore  --}}
        @error('category') 
          <div class="alert alert-danger">{{$message}} </div>
        @enderror
        

        {{-- disponibilita' piatto (boxradio) --}}
        <div class="mb-3">
          <div class="form-check ">
            <input class="form-check-input" type="radio" name="is_available" id="is_available" value="{{old('is_available',1)}}" checked>
            <label class="form-check-label" for="is_available">
              Disponibile
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="is_available" id="is_available" value="{{old('is_available',0)}}">
            <label class="form-check-label" for="is_available">
              Non disponibile
            </label>
          </div>
        </div>

        <div class="my-3">
          <label for="cover">Carica un'immagine:</label>
          <input type="file" class="form-control" name="cover" id="cover">
       </div>
       {{-- Messaggio di Errore --}}
       @error('cover')
          <div class="alert alert-danger">
             {{ $message }}
          </div>
       @enderror
     
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">reset</button>
      </form>

    </div>
  </div>
<h3><a href="{{route('admin.miei-ristoranti.piatti.index',$ristorante->slug)}}">Back <<</a></div>  
</div>
@endsection