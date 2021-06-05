@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dodaj zwierzaka</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('PetController@store') }}" enctype="multipart/form-data">
                        @csrf

                        <input id="user" type="hidden" class="form-control" name="user" value="<?php

                                                                                                use Illuminate\Support\Facades\Auth;

                                                                                                if (Auth::check()) {
                                                                                                    $user = Auth::user();
                                                                                                    if (isset($user->name)) {
                                                                                                        print($user->name);
                                                                                                    }
                                                                                                }
                                                                                                ?>
                                " readonly>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Imię zwierzaka</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Rodzaj zwierzaka</label>

                            <div class="col-md-6">
                                <select id="type" name="type" class="form-control @error('type') is-invalid @enderror" required autocomplete="type" autofocus>
                                    <option value="Pies">Pies</option>
                                    <option value="Kot">Kot</option>
                                </select>
                                {{-- <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>--}}

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="breed" class="col-md-4 col-form-label text-md-right">Rasa</label>

                            <div class="col-md-6">
                                <select id="breed" name="breed" class="form-control @error('breed') is-invalid @enderror" required autocomplete="breed" autofocus>
                                    <optgroup label="Psy">
                                        <option value="Labrador">Labrador</option>
                                        <option value="Owczarek niemiecki">Owczarek niemiecki</option>
                                        <option value="Buldog angielski">Buldog angielski</option>
                                        <option value="Golden retriever">Golden retriever</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Husky sybersyjski">Husky sybersyjski</option>
                                        <option value="Dog niemiecki">Dog niemiecki</option>
                                        <option value="Rottweiler">Rottweiler</option>
                                        <option value="Doberman">Doberman</option>
                                        <option value="Alaskan malamute">Alaskan malamute</option>
                                        <option value="Bernardyn">Bernardyn</option>
                                        <option value="Chow chow">Chow chow</option>
                                    </optgroup>
                                    <optgroup label="Kot">
                                        <option value="Kot perski">Kot perski</option>
                                        <option value="Kot syjamski">Kot syjamski</option>
                                        <option value="Kot brytyjski krótkowłosy">Kot brytyjski krótkowłosy</option>
                                        <option value="Sfinks">Sfinks</option>
                                    </optgroup>
                                </select>

                                @error('breed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2"> <span>Zdjęcie twojego pupila:</span>
                            <div class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                                <div class="absolute">
                                    <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i><span class="block text-blue-400 font-normal">Klikinj aby poszukać pliku:</span> </div>
                                </div> <input type="file" class="h-full w-full opacity-0" name="file">
                            </div>
                            <div class="flex justify-between items-center text-gray-400"> <span>Akceptowane typy: png i jpg</span></div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')