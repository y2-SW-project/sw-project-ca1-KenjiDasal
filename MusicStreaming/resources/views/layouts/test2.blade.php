<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('MediaPost', 'Media Post') }}</title>

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

<div class="wrapper ms-auto">
    <div class="sidebar">
        <h2>
        <a  href="{{ url('/') }}">
            KORDZ
        </a>
        </h2>
        <ul>
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a></li>
            <li><a  href="{{ url('/Playlist') }}"><i class="fas fa-user"></i>Playlist</a></li>
            <li><a  href="{{ url('/History') }}"><i class="fas fa-address-card"></i>About</a></li>
            <li><a  href="{{ url('/Purchase') }}"><i class="fas fa-project-diagram"></i>portfolio</a></li>

        </ul>

        <ul>
            <li><a href="{{ url('/Playlist') }}"><i class="fas fa-blog"></i>Joaquin</a></li>
            <li><a href="{{ url('/Playlist') }}"><i class="fas fa-address-book"></i>Keith</a></li>
            <li><a href="{{ url('/Playlist') }}"><i class="fas fa-map-pin"></i>Kenji</a></li>
        </ul>
        <div class="social_media">
            <ul class=" ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
<main class="py-4">
    @yield('content')
</main>
</body>
</html>
