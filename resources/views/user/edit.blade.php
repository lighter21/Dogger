@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edytuj adres użytkownika</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('updateAddress',['id'=>$databaseData['id']]) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">Ulica</label>

                                <div class="col-md-6">
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street', $databaseData['street']) }}" required autocomplete="street" autofocus>

                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="house_number" class="col-md-4 col-form-label text-md-right">Numer domu</label>

                                <div class="col-md-6">
                                    <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror" name="house_number" value="{{ old('house_number', $databaseData['house_number']) }}" required autocomplete="house_number" autofocus>

                                    @error('house_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postcode" class="col-md-4 col-form-label text-md-right">Kod pocztowy</label>

                                <div class="col-md-6">
                                    <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode', $databaseData['postcode']) }}" required autocomplete="postcode" autofocus>

                                    @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">Miejscowość</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $databaseData['house_number']) }}" required autocomplete="city" autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Nr telefonu</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $databaseData['phone_number']) }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
@endsection