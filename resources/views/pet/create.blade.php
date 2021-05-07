@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dodaj zwierzaka') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('PetController@store') }}" enctype ="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Użytkownik') }}</label>

                                <div class="col-md-6">
                                    <input id="user" type="text" class="form-control" name="user" value="<?php
                                        use Illuminate\Support\Facades\Auth;
                                    if (Auth::check())
                                    {
                                        $user = Auth::user();
                                        if (isset($user->name)) {
                                            print($user->name);
                                        }
                                    }
                                    ?>
                                    " readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imię zwierzaka') }}</label>

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
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Rodzaj zwierzaka') }}</label>

                                <div class="col-md-6">
                                    <select id="type" name="type" class="form-control @error('type') is-invalid @enderror" required autocomplete="type" autofocus>
                                        <option value="Pies">Pies</option>
                                        <option value="Kot">Kot</option>
                                    </select>
{{--                                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>--}}

                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="breed" class="col-md-4 col-form-label text-md-right">{{ __('Rasa') }}</label>

                                <div class="col-md-6">
                                    <select id="breed" name="breed" class="form-control @error('breed') is-invalid @enderror" required autocomplete="breed" autofocus>
                                        <optgroup label="Psy">
                                            <option value="Lablador">Lablador</option>
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
                            <div class="form-group row">
                                <label for="breed" class="col-md-4 col-form-label text-md-right">{{ __('Zdjęcie zwierzaka') }}</label>
                                <input type="file" name="file">
                            </div>
                                           
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj') }}
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

