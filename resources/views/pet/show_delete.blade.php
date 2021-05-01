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
