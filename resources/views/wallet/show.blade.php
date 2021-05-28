<table>
    <tr>
        <td>Id portfela:</td>
        <td>Użytkownik:</td>
        <td>Stan konta:</td>
    </tr>
        <tr>
            <td>
                {{$wallet->id}}
            </td>
            <td>
                {{$wallet->user->name}}
            </td>
            <td>
                {{$wallet->account_balance}}
            </td>
        </tr>
</table>

