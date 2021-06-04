@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edytuj zwierzaka') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('updatePet',['id'=>$databaseData['id']])}}" enctype ="multipart/form-data">
                            @method('PUT')
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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $databaseData['name'] }}" required autocomplete="name" autofocus>

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
                                        <option value="Pies" {{$databaseData['type']=='Pies' ? 'selected' : ''}}>Pies</option>
                                        <option value="Kot"{{$databaseData['type']=='Kot' ? 'selected' : ''}}>Kot</option>
                                    </select>

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
                                    <select id="breed" name="breed" class="form-control @error('breed') is-invalid @enderror"  required autocomplete="breed" autofocus>
                                        <optgroup label="Psy">
                                            <option value="Lablador"{{$databaseData['breed']=='Lablador' ? 'selected' : ''}}>Lablador</option>
                                            <option value="Owczarek niemiecki" {{$databaseData['breed']=='Owczarek niemiecki' ? 'selected' : ''}}>Owczarek niemiecki</option>
                                            <option value="Buldog angielski" {{$databaseData['breed']=='Buldog angielski' ? 'selected' : ''}}>Buldog angielski</option>
                                            <option value="Golden retriever" {{$databaseData['breed']=='Golden retriever' ? 'selected' : ''}}>Golden retriever</option>
                                            <option value="Chihuahua" {{$databaseData['breed']=='Chihuahua' ? 'selected' : ''}}>Chihuahua</option>
                                            <option value="Husky sybersyjski" {{$databaseData['breed']=='Husky sybersyjski' ? 'selected' : ''}}>Husky sybersyjski</option>
                                            <option value="Dog niemiecki" {{$databaseData['breed']=='Dog niemiecki' ? 'selected' : ''}}>Dog niemiecki</option>
                                            <option value="Rottweiler" {{$databaseData['breed']=='Rottweiler' ? 'selected' : ''}}>Rottweiler</option>
                                            <option value="Doberman" {{$databaseData['breed']=='Doberman' ? 'selected' : ''}}>Doberman</option>
                                            <option value="Alaskan malamute" {{$databaseData['breed']=='Alaskan malamute' ? 'selected' : ''}}>Alaskan malamute</option>
                                            <option value="Bernardyn" {{$databaseData['breed']=='Bernardyn' ? 'selected' : ''}}>Bernardyn</option>
                                            <option value="Chow chow" {{$databaseData['breed']=='Chow chow' ? 'selected' : ''}}>Chow chow</option>
                                        </optgroup>
                                        <optgroup label="Kot">
                                            <option value="Kot perski" {{$databaseData['breed']=='Kot perski' ? 'selected' : ''}}>Kot perski</option>
                                            <option value="Kot syjamski" {{$databaseData['breed']=='Kot syjamski' ? 'selected' : ''}}>Kot syjamski</option>
                                            <option value="Kot brytyjski krótkowłosy" {{$databaseData['breed']=='Kot brytyjski krótkowłosy' ? 'selected' : ''}}>Kot brytyjski krótkowłosy</option>
                                            <option value="Sfinks" {{$databaseData['breed']=='Sfinks' ? 'selected' : ''}}>Sfinks</option>
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
                                    Zapisz
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

