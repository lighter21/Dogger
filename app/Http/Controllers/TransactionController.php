<?php

namespace App\Http\Controllers;
use App\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Transaction;
use App\User;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('transaction.create');
    }
    public function validation(Request $request)
    {
        $this->validate($request, [
            'recipient' => 'required|min:2|max:30',
            'amount' => 'required|numeric|between:1,999999'
        ]);
        return $request;
    }
    public function store(Request $request)
    {
        $validatedRequest = $this->validation($request);
        $user2 = User::where('name', $validatedRequest->recipient )->firstOrFail();

        Transaction::create([
            "sender_id" => $userId = Auth::id(),
            "recipient_id" => $user2->id,
            "walk_id" => $validatedRequest->walk_id,
            "amount" => $validatedRequest->amount
        ]);

        $user_id = Auth::id();
        $senderWallet=Wallet::where('user_id', $user_id)->first();
        $senderWallet->account_balance -= $validatedRequest->amount;
        $senderWallet->save();
        $recipientWallet=Wallet::where('user_id', $user2->id)->firstOrFail();
        $recipientWallet->account_balance += $validatedRequest->amount;
        $recipientWallet->save();

        return redirect('home');
    }

}
