@extends('layouts.app')

@section('content')
    <div class="container">
        @isset($pendingWalks)
            <table>
                <tr>
                    <th>Id spaceru</th>
                    <th>akcje</th>
                </tr>
                @foreach($pendingWalks as $walk)
                    <tr>
                        <td>{{$walk->id}}</td>
                        <td>
                            <a href="{{route('acceptWalk', $walk->id)}}">Akceptuj</a>
                            <a href="{{route('declineWalk', $walk->id)}}">Odrzuć</a>
                        </td>
                    </tr>

                @endforeach
            </table>
        @endisset
        @empty($pendingWalks)
            <p> Nie masz żadnych oczekujących spacerów</p>
        @endempty
    </div>
@endsection
