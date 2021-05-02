<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
{{--Jakiś ładny header--}}
{{--Jakiś ładny subheader--}}
@isset($myPets)
    @if(session()->has('error'))
        <p>{{session('error')}}</p>
    @endif
    <form method="post" action="{{route('storeWalk')}}">
        @csrf
        <label for="data"> Zwierzak </label>
        <select name="pet_id">
            @foreach($myPets as $pet)
                <option value="{{$pet->id}}">{{$pet->name}}</option>
            @endforeach
        </select>
        @error('pet_id')
        <p>{{$message}}</p>
        @enderror
        {{--            To pole daty, deskrypcji spaceru bedzie dodane troche pozniej do bazy, na razie robimy podstawe. Ale sformatujcie to juz teraz, potem nie trzeba bedzie wracać--}}
        <label for="date"> Data odbycia spaceru </label>
        <input name="date" type="datetime-local">
        @error('data')
        <p>{{$message}}</p>
        @enderror
        <label for="description"> Dodatkowe informacje dla wyprowadzającego </label>
        <textarea name="description" type="datetime-local"> </textarea>
        @error('description')
        <p>{{$message}}</p>
        @enderror

        <input type="submit">
        @endisset
    </form>
    @empty($myPets)
        <p>Aby dodać spacer, musisz dodać swojego zwierzaka <a href="{{route('createPet')}}">tutaj</a></p>
    @endempty
</body>
</html>
