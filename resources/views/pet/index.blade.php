@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-center p-2 mb-2 text-6xl font-bold">Twoje zwierzęta:</div>
            <div class="card">
                <table class="table-auto text-center">
                    <tr class="border-2">
                        <td class="w-1/6">Imię:</td>
                        <td class="w-1/6">Rodzaj:</td>
                        <td class="w-1/6">Rasa:</td>
                        <td class="w-1/6">Zdjęcie:</td>
                        <td class="w-1/6">Usuwanie:</td>
                        <td class="w-1/6">Edycja:</td>
                    </tr>
                    @foreach($databaseData as $i)
                    <tr class="border-2">
                        <td>
                            {{$i['name']}}
                        </td>
                        <td>
                            {{$i['type']}}
                        </td>
                        <td>
                            {{$i['breed']}}
                        </td>
                        <td width="100px" height="100px">
                            <img class="mx-auto" src="{{ asset('storage/pet/'.$i->file_path)}}" alt="img" title="img" width="100px" height="100px">
                        </td>
                        <td>
                            <a role="button" class="bg-red-400 hover:bg-red-700 px-3 text-white inlineblock rounded mx-auto" onclick="return confirm('Czy jesteś pewny?')" href={{"delete/".$i['id']}}>Usuń</a>
                        </td>
                        <td>
                            <a role="button" class="bg-blue-400 hover:bg-blue-700 px-3 text-white inlineblock rounded" href={{"edit/".$i['id']}}>Edytuj</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection