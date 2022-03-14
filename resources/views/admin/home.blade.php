@extends('layouts.app')

@section('content')
<div class="background-team5 ">
<div class="container p-0 homeAdmin">
    <div class="row">
        <div class="mx-3 m-lg-0 col-lg-3">
            <div class="dash-board-team5 mt-3">
                <h2 class="dash-board-top-team5">
                    Ciao {{$user->name}}
                </h2>

                <div class="dash-board-bottom-team5 d-flex justify-content-center flex-wrap">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('admin.miei-ristoranti.index')}}">
                        <button class="btn-team5 btn-dashboard-team5">Home</button>
                    </a>
                    {{-- crea nuovo ristorante --}}
                   
                    <a href="{{route('admin.miei-ristoranti.create')}}">
                        <button class="btn-team5 btn-dashboard-team5">Nuovo Ristorante</button>
                    </a>
                    {{-- <livewire:counter/> --}}
                     
                </div>
            </div>
        </div>
    
        <div class="box-trasparent col-lg-9 px-5">
            
                @yield('dashboard-content')
    
         
        </div>
    
    </div>
</div>

</div>
@endsection
