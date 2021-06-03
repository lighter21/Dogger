@extends ('layouts.app')

@section('content')
{{--    <!-- NAGŁÓWEK -->--}}
{{--    <div class="bg-gray-200 flex justify-between shadow-md">--}}
{{--        <div class="flex items-center">--}}
{{--            <img class="flex-center h-28 w-28 m-2" src="/img/logo.png" alt="Logo">--}}
{{--            <h1 class="text-center font-bold text-gray-800">DOGGER</h1>--}}
{{--        </div>--}}

{{--        <div class="items-center flex">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div>--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a class="text-center font-bold text-white hover:no-underline text-2xl inline-block py-2 px-4 mr-2 bg-green-400--}}
{{--                        rounded hover:bg-green-500 shadow-md" href="{{ route('login') }}">Zaloguj </a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a class="text-center font-bold text-white hover:no-underline text-2xl inline-block py-2 px-4 bg-green-400--}}
{{--                            rounded hover:bg-green-500 shadow-md" href="{{ route('register') }}">Zarejestruj się!</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- CONTENT -->
    <div class="flex justify-between py-5 px-10 divide-dashed divide-x divide-gray-800">
        <div class="w-1/2 text-center font-bold text-gray-800 text-2xl p-5">
            <h1 class="font-bold mb-4">Witaj w naszej aplikacji!</h1>
            <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
            </h2>
        </div>
        <div class="w-1/2 p-5">
            <img class="flex-center rounded shadow-md" src="/img/dog_main_walk.jpg" alt="dog">
        </div>
    </div>

    <div class="flex justify-between py-5 px-10 divide-dashed divide-x divide-gray-800">
        <div class="w-1/2 p-5">
            <img class="flex-center rounded shadow-md" src="/img/dog_main_walk_2.jpg" alt="dog">
        </div>
        <div class="w-1/2 text-center font-bold text-gray-800 text-2xl p-5">
            <h1 class="font-bold mb-4">Zarejestruj się!</h1>
            <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
            </h2>
        </div>
    </div>

    <!-- STOPKA -->

@endsection


