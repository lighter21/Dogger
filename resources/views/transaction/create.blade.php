@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Zatwierdzenie transakcji</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('TransactionController@store') }}" enctype ="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="sender" class="col-md-4 col-form-label text-md-right">Użytkownik</label>

                                <div class="col-md-6">
                                    <input id="sender" type="text" class="form-control" name="sender" value="<?php
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
                                <label for="recipient" class="col-md-4 col-form-label text-md-right">Adresat</label>

                                <div class="col-md-6">
                                    <input id="recipient" type="text" class="form-control @error('recipient') is-invalid @enderror" name="recipient" value="{{ old('recipient') }}" required autocomplete="recipient" autofocus>

                                    @error('recipient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="walk_id" class="col-md-4 col-form-label text-md-right">Id spaceru</label>

                                <div class="col-md-6">
                                    <input id="walk_id" type="text" class="form-control @error('walk_id') is-invalid @enderror" name="walk_id" value="{{ old('walk_id') }}" required autocomplete="walk_id" autofocus>

                                    @error('walk_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">Wartość</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Zatwierdź
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

