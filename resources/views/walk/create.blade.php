@extends('layouts.app')

@section('content')
    <div class="flex items-center h-screen w-full">
        <div class="w-full bg-white rounded shadow-lg p-8 m-4">
            <h1 class="block w-full text-center text-gray-400 mb-6">Dodaj ogłoszenie</h1>
            @isset($myPets)
                @if(session()->has('error'))
                    <p>{{session('error')}}</p>
                @endif
                <form class="mb-4 flex flex-wrap justify-between" method="post" action="{{route('storeWalk')}}">
                    @csrf
                    <div class="flex flex-col mb-4 md:w-1/2">
                        <label class="mb-2 uppercase tracking-wide font-bold text-lg text-gray-400" for="data"> Zwierzak </label>
                        <select class="border py-2 px-3 md:mr-2" name="pet_id">
                            @foreach($myPets as $pet)
                                <option value="{{$pet->id}}">{{$pet->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('pet_id')
                    <p>{{$message}}</p>
                    @enderror
            {{--            To pole daty, deskrypcji spaceru bedzie dodane troche pozniej do bazy, na razie robimy podstawe. Ale sformatujcie to juz teraz, potem nie trzeba bedzie wracać--}}
                    <div class="flex flex-col mb-4 md:w-1/2">
                        <label class="mb-2 uppercase font-bold text-lg text-gray-400 md:ml-2" for="date"> Data odbycia spaceru </label>
                        <input class="border py-2 px-3 md:ml-2" name="date" type="datetime-local">
                    </div>
                    @error('data')
                    <p>{{$message}}</p>
                    @enderror
                    <div class="flex flex-col mb-4 w-full">
                        <label class="mb-2 uppercase font-bold text-lg text-gray-400" for="description"> Dodatkowe informacje dla wyprowadzającego </label>
                        <textarea class="border py-2 px-3" name="description" type="datetime-local"> </textarea>
                    </div>
                    @error('description')
                    <p>{{$message}}</p>
                    @enderror
                    <div class="flex flex-col mb-6 w-full">
                        <label class="mb-2 uppercase font-bold text-lg text-gray-400" for="description"> Stawka </label>
                        <input class=" border py-2 px-3" type="text">
                    </div>
                    <button class="block bg-green-400 hover:bg-green-500 text-white uppercase text-lg mx-auto p-4 rounded" type="submit">Dodaj ogłoszenie</button>
                    @endisset
                </form>
                @empty($myPets)
                    <p>Aby dodać spacer, musisz dodać swojego zwierzaka <a href="{{route('createPet')}}">tutaj</a></p>
                @endempty
        </div>
    </div>
@endsection
