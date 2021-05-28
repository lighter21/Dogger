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
<body class="flex flex-col h-screen justify-between">
    <div id="app">
        <!-- navbar -->
        <div class="relative bg-gray-200 border-b-2 border-gray-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex justify-between items-center py-3 md:justify-start md:space-x-10">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="{{ url('/home') }}">
                            <span class="sr-only">Workflow</span>
                            <img class="h-auto w-16 sm:h-10" src="/img/logo.png" alt="dogger icon">
                        </a>
                    </div>
                    <div class="-mr-2 -my-2 md:hidden">
                        <button onclick="buttonclickm();" type="button" class="bg-gray-200 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none" aria-expanded="false">
                            <span class="sr-only">Open menu</span>
                            <!-- Heroicon -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                    <nav class="hidden md:flex space-x-10">
                        <div class="relative">

                            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                            <button onclick="buttonclicko();" type="button" class="text-gray-500 group bg-gray-200 rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none" aria-expanded="false">
                                <span>Ogłoszenia</span>
                                <!--
                                  Heroicon

                                  Item active: "text-gray-600", Item inactive: "text-gray-400"
                                -->
                                <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Tutaj zaczyna się rozwijane menu ogłoszenia -->
                            <div id="menuogloszenia" class="hidden absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 hover:no-underline">
                                            <!-- Heroicon -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                            <div class="ml-4">
                                                <p class="text-base font-medium text-gray-900">
                                                    Lista ogłoszeń
                                                </p>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    Sprawdź wszystkie dostępne ogłoszenia
                                                </p>
                                            </div>
                                        </a>

                                        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 hover:no-underline">
                                            <!-- Heroicon -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div class="ml-4">
                                                <p class="text-base font-medium text-gray-900">
                                                    Dodaj ogłoszenie
                                                </p>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    Dodaj własną ofertę
                                                </p>
                                            </div>
                                        </a>

                                        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 hover:no-underline">
                                            <!-- Heroicon -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <div class="ml-4">
                                                <p class="text-base font-medium text-gray-900">
                                                    Edytuj ogłoszenie
                                                </p>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    Edytuj swoje ogłoszenia
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Koniec rozwijanego menu ogłoszenia -->

                        <a href="#" class="text-base font-medium text-gray-500 hover:no-underline hover:text-gray-900">
                            DoggerCoin
                        </a>

                        <div class="relative">
                            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                            <button onclick="buttonclick();" type="button" class="text-gray-500 group bg-gray-200 rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none" aria-expanded="false">
                                <span>Profil</span>
                                <!--
                                  Heroicon

                                  Item active: "text-gray-600", Item inactive: "text-gray-400"
                                -->
                                <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Tutaj zaczyna się rozwijane menu profil -->
                            <div id="menuprofil" class="hidden absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 hover:no-underline">
                                            <!-- Heroicon -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                            </svg>
                                            <div class="ml-4">
                                                <p class="text-base font-medium text-gray-900">
                                                    Informacje o koncie
                                                </p>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    Sprawdź wszystkie informacje na temat swojego konta
                                                </p>
                                            </div>
                                        </a>

                                        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 hover:no-underline">
                                            <!-- Heroicon -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <div class="ml-4">
                                                <p class="text-base font-medium text-gray-900">
                                                    Edytuj dane
                                                </p>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    Edytuj dane dotyczące swojego konta
                                                </p>
                                            </div>
                                        </a>

                                        <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 hover:no-underline">
                                            <!-- Heroicon -->
                                            <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                            </svg>
                                            <div class="ml-4">
                                                <p class="text-base font-medium text-gray-900">
                                                    Historia zleceń
                                                </p>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    Sprawdź historię swoich zleceń
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- Tutaj kończy się rozwijane menu profil -->
                        </div>
                        <div class="flex text-base font-medium font-bold text-gray-500">
                            DoggerCoin:
                            <div class="ml-1 px-1 text-yellow-500">
                                @isset($wallet)
                                {{$wallet->account_balance}}
                                @endisset
                            </div>
                        </div>
                    </nav>
                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                        <a class="ml-6 whitespace-nowrap inline-flex items-center justify-center px-3 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 hover:no-underline" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Wyloguj się') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

            <!--
              Mobile menu
            -->
            <div id="menumobile" class="hidden absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                    <div class="pt-5 pb-6 px-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <img class="h-auto w-16" src="/img/logo.png" alt="dogger icon">
                            </div>
                            <div class="-mr-2">
                                <button onclick="buttonclickm();" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                                    <span class="sr-only">Close menu</span>
                                    <!-- Heroicon -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mt-6">
                            <nav class="grid gap-y-8">
                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50 hover:no-underline">
                                    <!-- Heroicon -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900">
                                        Ogłoszenia
                                    </span>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50 hover:no-underline">
                                    <!-- Heroicon -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900">
                                        DoggerCoin
                                    </span>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50 hover:no-underline">
                                    <!-- Heroicon -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900 hover:no-underline">
                                        Profil
                                    </span>
                                </a>

                                <div class="-m-3 p-3 flex items-center rounded-md">
                                    <!-- Heroicon -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="flex font-bold ml-3 text-base font-medium text-gray-900 hover:no-underline">
                                        DoggerCoin:
                                        <div class="ml-1 text-yellow-500">
                                            95
                                        </div>
                                    </span>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="py-6 px-5 space-y-6">
                        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                            <a href="#" class="text-base font-medium text-gray-700 hover:text-gray-900 hover:no-underline">
                                Lista ogłoszeń
                            </a>

                            <a href="#" class="text-base font-medium text-gray-700 hover:text-gray-900 hover:no-underline">
                                Informacje o koncie
                            </a>

                            <a href="#" class="text-base font-medium text-gray-700 hover:text-gray-900 hover:no-underline">
                                Dodaj ogłoszenie
                            </a>

                            <a href="#" class="text-base font-medium text-gray-700 hover:text-gray-900 hover:no-underline">
                                Edytuj dane
                            </a>

                            <a href="#" class="text-base font-medium text-gray-700 hover:text-gray-900 hover:no-underline">
                                Edytuj ogłoszenie
                            </a>

                            <a href="#" class="text-base font-medium text-gray-700 hover:text-gray-900 hover:no-underline">
                                Historia zleceń
                            </a>
                        </div>
                        <div>
                            <a class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 hover:no-underline" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Wyloguj się') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <script>
        function buttonclick()
        {
            var menuprofil = document.getElementById("menuprofil");
            var menuogloszenia = document.getElementById("menuogloszenia");

            if(menuprofil.classList.contains('hidden')){
                if(menuogloszenia.classList.contains('hidden'))
                {
                    menuprofil.classList.remove('hidden');
                }else {
                    menuogloszenia.classList.add('hidden');
                    menuprofil.classList.remove('hidden');
                }

            }else{
                menuprofil.classList.add('hidden');
            }
        }
    </script>

<script>
    function buttonclicko()
    {
        var menuogloszenia = document.getElementById("menuogloszenia");
        var menuprofil = document.getElementById("menuprofil");

        if(menuogloszenia.classList.contains('hidden')){
            if(menuprofil.classList.contains('hidden')){
                menuogloszenia.classList.remove('hidden');
            }else{
                menuprofil.classList.add('hidden');
                menuogloszenia.classList.remove('hidden');
            }

        }else{
            menuogloszenia.classList.add('hidden');
        }
    }
</script>

<script>
    function buttonclickm()
    {
        var menumobile = document.getElementById("menumobile");

        if(menumobile.classList.contains('hidden')){
            menumobile.classList.remove('hidden');
        }else {
            menumobile.classList.add('hidden');
        }
    }
</script>

</body>
</html>
