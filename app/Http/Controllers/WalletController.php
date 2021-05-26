<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show() {
        $userId = Auth::id();
        $wallet = Wallet::firstOrCreate(
            ["user_id" => $userId],
            ["account_balance" => 0.00]
        );
        $user = auth()->user();

        return view('wallet.show', ['wallet'=>$wallet]);
    }
    public function updateMyWallet(Request $request)
    {
        $user_id = Auth::id();
        $wallet=Wallet::where('user_id', $user_id)->first();
        $wallet->account_balance += $request->amountCoins;
        $wallet->save();

        return redirect('wallet/');
    }
    public function updateDifferentWallet(Request $request)
    {
        $user_id = Auth::id();
        $wallet=Wallet::where('user_id', $user_id)->first();
        $wallet->account_balance += $request->amountCoins;
        $wallet->save();

        return redirect('wallet/');
    }

}
