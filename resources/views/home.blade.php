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

    <div class="flex justify-between py-2 px-5 divide-dashed divide-x divide-gray-800">
        <div class="w-1/3 text-center font-bold text-gray-800 text-2xl p-5">
            <h1 class="font-bold mb-4">Witaj {{auth()->user()->name}}</h1>
            <img class="flex-center rounded shadow-md" src="/img/dog.png" alt="dog">
        </div>
        <div class="w-2/3 p-5">
            <h1 class="font-bold mb-3">Ogłoszenia</h1>
            <h2 class="mb-5">W tym panelu możesz sprawdzić wszystkie aktualnie dostępne ogłoszenia, a także dodać lub edytować własne.
                 Ogłoszenia możesz szukać, poprzez wybranie docelowej odległości ogłoszenia od twojej aktualnej lokalizacji. Są
            także opcje filtrowania ogłoszeń, gdzie dodać możesz dodatkowe wymagane infromacje takie jak cena.</h2>
            <h1 class="font-bold mb-3">Profil</h1>
            <h2 class="mb-5">Zakładka profil umożliwia sprawdzenie wszystkich informacji na temat twojego konta, ora historii zleceń,
            które zostały pzez Ciebie wykonane lub też utworzone. Możesz tam również zaktualizować dane Twojego konta. </h2>
            <h1 class="font-bold mb-3">DoggerCoin</h1>
            <h2 class="mb-5">Jest to waluta, za pomocą której możesz dokonwywać transakcji w naszej aplikacji. Możesz ją wykorzystać min. do
            opłaty za wykonanie twoich ogłoszeń lub wykupienie funkcji premium. Istnieje również możliwość wypłaty DoggerCoina
            na inne waluty za drobną prowizją*.</h2>
        </div>
    </div>

@endsection
