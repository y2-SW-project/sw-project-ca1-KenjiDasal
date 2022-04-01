<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('KORDZ', 'KORDZ') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="icon" href="resources\images\top.png>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

{{-- KORDZ
Home
Playlist
History
Purchase

Joaquin
Keith
Kenji

login
sign up --}}
<div class="d-flex">
<div class="wrapper d-flex justify-content-center">
    <div class="sidebar ">
        <a href="{{ url('/') }}" class="text-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4 text-center">KORDZ</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link text-white" aria-current="page">

                Home
              </a>
            </li>
            <li>
              <a href="{{ url('admin/musics/playlist') }}" class="nav-link text-white">

                Playlist
              </a>
            </li>
            <li>
              <a href="{{ url('/History') }}" class="nav-link text-white">

                History
              </a>
            </li>
            <li>
              <a href="{{ url('/Purchase') }}" class="nav-link text-white">

                Purchase
              </a>
            </li>

          </ul>
          <hr>
          <div class="dropdown mt-auto">
            <ul class=" ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}" class="nav-link text-white">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}"class="nav-link text-white">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
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
      </div>
    </div>




<main class="main d-flex justify-content-center py-4">
    @yield('content')
</main>
</div>
</div>
</body>
</html>
