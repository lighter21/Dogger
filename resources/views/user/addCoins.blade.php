@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="text-center p-2 mb-2 text-6xl font-bold">Doładuj Dogger Coiny!</div>

                    <div class="card-body">

                        <form method="POST" action="{{route('updateWallet')}}" enctype ="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="user" type="hidden" class="form-control" name="user" value="<?php
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
                                <label for="amountCoins" class="col-md-4 col-form-label text-md-right">Ilość Coinów:</label>

                                <div class="col-md-6">
                                    <select id="amountCoins" name="amountCoins" class="form-control @error('amountCoins') is-invalid @enderror" required autocomplete="amountCoins" autofocus>
                                            <option value="10">10 - 10zł</option>
                                            <option value="25">25 - 24zł</option>
                                            <option value="50">50 - 47zł</option>
                                            <option value="100">100 - 90zł</option>
                                            <option value="200">200 - 175zł</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 mt-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Doładuj Dogger Coiny
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
        </div>
        <div class="text-center p-2 mb-2 mt-4 text-4xl font-bold">Obsługiwane płatności:</div>
        <img class="h-100% w-100% m-4" src="/img/payment_methods.png" alt="no payment method">
    </div>
</div>
    @endsection
