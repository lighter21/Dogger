@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodaj Ogłoszenie</div>
                    <div class="card-body">
                        @isset($myPets)
                            @if(session()->has('error'))
                                <p>{{session('error')}}</p>
                            @endif
                            <form method="POST" action="{{route('storeWalk')}}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="data">Zwierzak</label>
                                    <select class="col-md-6" name="pet_id">
                                        @foreach($myPets as $pet)
                                            <option value="{{$pet->id}}">{{$pet->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('pet_id')
                                <p>{{$message}}</p>
                                @enderror
                                {{--            To pole daty, deskrypcji spaceru bedzie dodane troche pozniej do bazy, na razie robimy podstawe. Ale sformatujcie to juz teraz, potem nie trzeba bedzie wracać--}}
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="date"> Data odbycia
                                        spaceru </label>
                                    <input class="border py-2 px-3" name="date" type="datetime-local">
                                </div>
                                @error('data')
                                <p>{{$message}}</p>
                                @enderror
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="description"> Dodatkowe
                                        informacje dla wyprowadzającego </label>
                                    <textarea class="border py-2 px-3" name="description" type="datetime-local"> </textarea>
                                </div>
                                @error('description')
                                <p>{{$message}}</p>
                                @enderror
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="description"> Stawka </label>
                                    <input name="payment" class="border py-2 px-3" type="number">
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Dodaj ogłoszenie
                                        </button>
                                    </div>
                                </div>
                                @endisset
                            </form>
                            @empty($myPets)
                                <p>Aby dodać spacer, musisz dodać swojego zwierzaka <a href="{{route('createPet')}}">tutaj</a></p>
                            @endempty
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
