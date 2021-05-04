<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dogger</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="text-4xl font-bold flex hover:no-underline text-black hover:text-black" href="{{ url('/home') }}">
                    Dogger
                    <img class="h-12 w-12" src="/img/logo.png" alt="dogger icon">
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Zalogowany jako: {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj się') }}
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div>
        <footer class="p-2 w-full text-center bg-gray-200 shadow-inner">
            <div class="grid md:grid-cols-4  gap-2">
                <ul class="m-2 p-2 text-gray-500">
                    <li class="font-bold">O nas:</li>
                    <li>Studio skupiające się na aplikacjach ułatwiających codzienne czynności</li>
                </ul>
                <ul class="m-2 p-2 text-gray-500">
                    <li class="font-bold">O projekcie:</li>
                    <li>Projekt stworzony z myślą o miłośnikach zwierząt - tak aby każdy mógł czerpać radość ze spaceru</li>
                </ul>
                <ul class="m-2 p-2 text-gray-500">
                    <li class="font-bold">Kontakt</li>
                    <li>Numer telefonu: 123 456 789</li>
                    <li>e-mail: dogger@mail.com</li>
                </ul>
                <ul class="m-2 p-2 text-gray-500">
                    <li class="font-bold">Media społecznościowe:</li>
                    <li class="flex justify-center">
                        <img class="h-9 w-9 m-2" src="/img/facebook_icon.png" alt="facebook icon">
                        <img class="h-10 w-10 m-2" src="/img/instagram_icon.png" alt="instagram icon">
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>
