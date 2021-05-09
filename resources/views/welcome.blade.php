@extends ('layout')

    @section ('welcome')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Zaloguj</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Zarejestruj się!</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <img src="/img/doggo.png" alt="dogger logo">
                <div class="title">
                    DOGGER
                </div>

                <div>
                    <nav id="topnav">

                        <ul class="menu">
                            <li><a href="welcome.blade.php">Strona główna</a></li>
                            <li><a href="search.php">Znajdź ogłoszenie</a></li>
                            <li><a href="add.php">Dodaj ogłoszenie</a></li>
                            <li><a href="blad.php">Zgłoś błąd</a></li>
                        </ul>
                    </nav>
                </div>
                <div>

                </div>
            </div>
        </div>

    @endsection
