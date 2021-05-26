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
Doładuj Doggercoiny
<table>
    <tr>
        <td>
            <form method="POST" action="{{route('updateWallet')}}" enctype ="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="amountCoins" >10 DGC</label>
                <input id="amountCoins" type="text" name="amountCoins" value="10" readonly hidden>
                <button type="submit" class="btn btn-primary">
                    Doładuj
                </button>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form method="POST" action="{{route('updateWallet')}}" enctype ="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="amountCoins" >20 DGC</label>
                <input id="amountCoins" type="text" name="amountCoins" value="20" readonly hidden>
                <button type="submit" class="btn btn-primary">
                    Doładuj
                </button>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form method="POST" action="{{route('updateWallet')}}" enctype ="multipart/form-data">
                @method('PUT')
                @csrf
                <label for="amountCoins" >30 DGC</label>
                <input id="amountCoins" type="text" name="amountCoins" value="30" readonly hidden>
                <button type="submit" class="btn btn-primary">
                    Doładuj
                </button>
            </form>
        </td>
    </tr>
</table>
