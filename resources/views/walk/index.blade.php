<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@if(session()->has('message'))
    <p>{{session('message')}}</p>
@endif
    <table>
        @isset($walks)
            <table>
                <tr>
                    <th>ID</th>
                    <th>Gatunek</th>
                    <th>Rasa</th>
                    <th>Data</th>
                    <th></th>
                </tr>
                @foreach($walks as $walk)
                    <tr><a href="{{ route('showWalk', $walk->id) }}"> {{$walk->id}} </a></tr>
                    <tr>{{$walk->pet->type}}</tr>
                    <tr>{{$walk->pet->breed}}</tr>
                    <tr>{{$walk->created_at}}</tr>
                    <tr> <a href="{{route('showWalk', $walk->id)}}">Umów się</a> </tr>
{{--                    Tutaj przyjdą duże zmiany, czyli lokalizacja, zdjecie, i data kiedy ma byc spacer. Przygotujcie prezentacje danych jako obiekt typu card - znajdziecie to w dokumentacji frameworka w css, jako zdjecie dajcie jakies jedno domyslne--}}
                @endforeach
            </table>
        @endisset
        @empty($walks)
            <p>Nie dodano jeszcze żadnych spacerów</p>
        @endempty
    </table>
</body>
</html>
