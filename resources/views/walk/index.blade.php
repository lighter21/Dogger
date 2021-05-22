@extends('layouts.app')

@section('content')
    <div><!-- content -->
        @if(session()->has('message'))
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold " role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p class="pt-3">{{session('message')}}</p>
            </div>
        @endif
        <div class="text-center p-2 mb-2 text-6xl font-bold">Ogłoszenia</div>
        <div class="mx-24 grid md:grid-cols-2 lg:grid-cols-3">
            @isset($walks)
                @foreach($walks as $walk)
                    <div class="m-6 bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl relative"> <!-- cards here -->
                        <img class="h-80 w-full object-cover" src="{{asset('img/dog.png')}}" alt="dog">
                        <div class="m-4">
                            <span class="m-2 text-xl md:text-xl block text-center font-bold text-green-400">{{$walk->pet->breed}}</span>
                            <span class="m-2 text-xl md:text-xl block text-center font-bold text-green-400">{{$walk->user->city}}</span>
                            <span class="m-2 block text-center font-bold text-green-400">Odbędzie się: {{$walk->date}}</span>
                            <span class="m-2 block text-center font-bold text-green-400">Stawka: {{$walk->payment}} zł</span>
                            <div class="border bg-gray-100 text-green-400 text-lg uppercase font-bold rounded-full py-2 px-3 absolute top-0 ml-1 mt-2">
                                <span class="">{{$walk->pet->name}}</span>
                            </div>
                            <div class="flex justify-center">
                                <span class="text-center text-l md:text-xl border-green-500 border-4 rounded-full px-3 py-2 text-s font-bold cursor-pointer tracking-wider uppercase hover:bg-gray-100">
                                    <a class="text-green-400 hover:no-underline hover:text-green-400" href="{{ route('showWalk', $walk->id) }}"> Więcej informacji </a>
                                </span>
                            </div>
                        </div>
                    </div>
                {{--Tutaj przyjdą duże zmiany, czyli lokalizacja, zdjecie, i data kiedy ma byc spacer. Przygotujcie prezentacje danych jako obiekt typu card - znajdziecie to w dokumentacji frameworka w css, jako zdjecie dajcie jakies jedno domyslne--}}
                @endforeach
            @endisset
            @empty($walks)
                    <p>Nie dodano jeszcze żadnych spacerów</p>
                @endempty
        </div>
    </div>
@endsection
