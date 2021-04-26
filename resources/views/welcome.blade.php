@extends ('layout')

    @section ('welcome')
        <div class="flex-center position-ref ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Zaloguj</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Zarejestruj się!</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="content">
            <img src="/img/dogger_logo.png" alt="dogger logo">
            <div class="title">
                <h3>DOGGER</h3>
            </div>
            <div>
                <img src="/img/dog_on_walk_0.png" alt="test0">

                <div>
                    <h1>Wyprowadź psa na spacer!</h1>
                    <p>Musisz wyjść z psem na spacer ale z jakiegoś powodu nie możesz?</p>
                    <p>Nasza aplikacja jest właśnie dla Ciebie. Dzięki niej, łatwo i szybko znajdzieś kogoś kto wyjdzie
                    z Twoim psem na spacer.</p>
                </div>
                <img src="/img/dog_on_walk_1.png" alt="test1">
                <div>
                    <h1>Zarejestruj się już dziś, ZA DARMO!</h1>
                    <p>Aby móc w pełni korzystać z naszej aplikacji, musisz najpierw utworzyć darmowe konto w naszej
                    aplikacji</p>
                </div>

                </div>
        </div>

    @endsection
