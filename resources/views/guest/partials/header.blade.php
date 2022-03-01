<header>

  <div class="logo">
    <a href="{{route('home')}}">
      <img src="img/logoDeliveBoo.png" alt="logo deliveboo">
    </a> 
  </div>
  <div class="header-content">
    {{-- nav login --}}
      @if (Route::has('login'))
          <div class="top-right links">
              @auth
                  <a href="{{ route('admin.index') }}">Il Tuo Profilo</a>
              @else
                  <a href="{{ route('login') }}">Login</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}">Register</a>
                  @endif
              @endauth
          </div>
      @endif
  </div>

</header>