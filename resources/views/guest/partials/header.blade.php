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
                  <a href="{{ route('admin.index') }}" class="ac-btn">Il Tuo Profilo</a>
              @else
                  <a href="{{ route('login') }}"class="ac-btn">Login</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}"class="ac-btn">Register</a>
                  @endif
              @endauth
          </div>
      @endif
  </div>

</header>