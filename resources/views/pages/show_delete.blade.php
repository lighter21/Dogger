@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ url('/home') }}">Home</a>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <table>
                                <tr>
                                    <td>Imię:</td>
                                    <td>Rodzaj:</td>
                                    <td>Rasa:</td>
                                    <td>Usuwanie</td>
                                </tr>
                                @foreach($database_data as $i)
                                    <tr>
                                        <td>
                                            {{$i['name']}}
                                        </td>
                                        <td>
                                            {{$i['type']}}
                                        </td>
                                        <td>
                                            {{$i['breed']}}
                                        </td>
                                        <td>
                                            <a href={{"delete/".$i['id']}}>Usuń</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')

