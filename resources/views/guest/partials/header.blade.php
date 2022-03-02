<header>

  <div class="logo">
    <a href="{{route('home')}}">
      <img src="{{asset('img/logoDeliveBoo.png')}}" alt="logo deliveboo">
    </a> 
  </div>
  <div class="header-content">
    {{-- nav login --}}
      {{-- @if (Route::has('login'))
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
      @endif --}}

      <ul class="top-right links d-flex">
        <!-- Authentication Links -->
        @guest
            <li>
                <a class=" ac-btn" href="{{ route('login') }}" >{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li >
                    <a class=" ac-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle ac-btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                  @if (Route::currentRouteName()!='admin.index')
                    <a class="dropdown-item ac-btn" href="{{ route('admin.index') }}">Il Tuo Profilo</a>
                  @endif

                    <a class="dropdown-item ac-btn" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
  </div>

</header>