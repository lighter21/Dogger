@extends('layouts.app')

@section('welcome')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <a class="nav-link" href="pages/create">{{ __('Dodaj zwierzaka') }}</a>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="w-full grid md:grid-cols-4 gap-1">
        <div class="text-4xl md:border-r-2 p-3 md:row-span-3 md:flex md:justify-center">
            <nav class="text-center mt-4">
                <h1 class="text-center font-bold text-gray-700">MENU</h1>
                <ul class="text-xl mt-6">
                    <li class="font-bold">
                        <a href="#" class="hover:no-underline">
                            <span class="text-gray-400 hover:text-gray-600">Strona główna</span>
                        </a>
                    </li>
                    <li class="font-bold mt-4">
                        <a href="{{ url('/walk') }}" class="hover:no-underline">
                            <span class="text-gray-400 hover:text-gray-600">Ogłoszenia</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:no-underline">
                            <span class="text-gray-400 hover:text-gray-600">Szukaj ogłoszeń</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:no-underline">
                            <span class="text-gray-400 hover:text-gray-600">Dodaj ogłoszenie</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:no-underline">
                            <span class="text-gray-400 hover:text-gray-600">Edytuj ogłoszenie</span>
                        </a>
                    </li>
                    <li class="font-bold mt-4">
                        <a href="#" class="hover:no-underline">
                            <span class="text-gray-400 hover:text-gray-600">Konto Premium</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:no-underline">
                            <span class="text-gray-400 hover:text-gray-600">Kup wersję Premium</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:no-underline">
                            <span class="text-gray-400 hover:text-gray-600">Kup DoggerCoiny</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="text-gray-400 text-4xl p-3 md:col-span-3">
            <h1 class="text-center">Witaj ponownie !</h1>
            <div class="flex justify-center">
                <img class="h-72 w-72 m-4" src="/img/dog.png" alt="nocopyrights dog">
            </div>
            <h3 class="text-center">Czy to już pora na kolejny spacer ?</h3>
        </div>
    </div>

@endsection
