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
    <script src="{{ asset('js/demo_db_connection.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="icon" href="resources\images\top.png>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
<div class=" flex">
    <div class="col-md-2 wrapper d-flex justify-content-center">
        <div class="sidebar  testing-drop">
            <div>
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
                        <a href="{{ route('login') }}" class="nav-link text-white">

                Playlist
              </a>
                    </li>
                    <li>
                        <a href="{{ url('/History') }}" class="nav-link text-white">

                History
              </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="nav-link text-white">

                Songs
              </a>
                    </li>

                </ul>
                <hr>
            </div>
            <div class="dropdown mt-auto">
                <ul class=" ms-auto">
                    <!-- Authentication Links -->
                    @guest @if (Route::has('login'))
                    <li>
                        <a href="{{ route('login') }}" class="nav-link text-white">{{ __('Login') }}</a>
                    </li>
                    @endif @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}" class="nav-link text-white">{{ __('Register') }}</a>
                    </li>
                    @endif @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="btn-group dropup" aria-labelledby="navbarDropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a>
                            </button>
                            <div class="dropdown-menu">
                              <!-- Dropdown menu links -->
                            </div>
                          </div>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


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

    <main class="col-md-10 main d-flex">
        @yield('content')
    </main>

</div>
</div>
</div>

@yield('music_player')
</body>
</html>
