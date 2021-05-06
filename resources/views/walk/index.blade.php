@extends('layouts.app')

@section('content')
    <div><!-- content -->
        <div class="text-center p-2 mb-2 text-6xl font-bold">Ogłoszenia</div>
            @if(session()->has('message'))
                <p>{{session('message')}}</p>
            @endif
        <div class="mx-24 grid md:grid-cols-2 lg:grid-cols-3">
            @isset($walks)
                @foreach($walks as $walk)
                    <div class="m-6 bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl relative"> <!-- cards here -->
                        <img class="h-80 w-full object-cover" src="/img/dog.png" alt="nocopyrights dog">
                        <div class="m-4">
                            <div class="flex justify-center">
                                <span class="text-center text-l md:text-xl border-green-500 border-4 rounded-full px-3 py-2 text-s font-bold cursor-pointer tracking-wider uppercase hover:bg-gray-100">
                                    <a class="text-green-400 hover:no-underline hover:text-green-400" href="{{ route('showWalk', $walk->id) }}"> Więcej informacji </a>
                                </span>
                            </div>
                            <span class="m-2 text-xl md:text-xl block text-center font-bold text-green-400">Rasa: {{$walk->pet->breed}}</span>
                            <span>{{$walk->created_at}}</span>
                            <div class="flex justify-center">
                                <span class="text-center text-l md:text-xl border-green-500 border-4 rounded-full px-3 py-2 text-s font-bold cursor-pointer tracking-wider uppercase hover:bg-gray-100">
                                    <a class="text-green-400 hover:no-underline hover:text-green-400" href="{{route('showWalk', $walk->id)}}">Umów się</a>
                                </span>
                            </div>
                            <div class="border bg-gray-100 text-green-400 text-lg uppercase font-bold rounded-full py-2 px-3 absolute top-0 ml-1 mt-2">
                                <span class="">{{$walk->pet->name}}</span>
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
