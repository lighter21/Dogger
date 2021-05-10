<table>
    <tr>
        <td>Imię:</td>
        <td>Rodzaj:</td>
        <td>Rasa:</td>
        <td>Usuwanie</td>
        <td>Edycja</td>
    </tr>
    @foreach($databaseData as $i)
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
                <a role="button" onclick="return confirm('Czy jesteś pewny?')" href={{"delete/".$i['id']}}>Usuń</a>
            </td>
            <td>
                <a role="button" href={{"edit/".$i['id']}}>Edytuj</a>
            </td>
        </tr>
    @endforeach
</table>
