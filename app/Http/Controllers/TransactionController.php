<?php

namespace App\Http\Controllers;
use App\Walk;
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
            'recipient' => 'required|min:2|max:40',
            'amount' => 'required|numeric|between:1,999999'
        ]);
        return $request;
    }
    public function store(Request $request)
    {
        $validatedRequest = $this->validation($request);
        $user2 = User::where('email', $validatedRequest->recipient )->firstOrFail();

        Transaction::create([
            "sender_id" => $userId = Auth::id(),
            "recipient_id" => $user2->id,
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
    public function payWalk($walkId,$tenantEmail,$coins)
    {
        $user_id = Auth::id();
        $user2 = User::where('email', $tenantEmail )->firstOrFail();

        Transaction::create([
            "sender_id" => $userId = Auth::id(),
            "recipient_id" => $user2->id,
            "amount" => $coins,
        ]);

        $walk = Walk::where('id', $walkId)->firstOrFail();
        if ($walk->done == false){
            $walk->done = true;
            $walk->save();
        }

        $senderWallet=Wallet::where('user_id', $user_id)->first();
        $senderWallet->account_balance -= $coins;
        $senderWallet->save();

        $recipientWallet=Wallet::where('user_id', $user2->id)->firstOrFail();
        $recipientWallet->account_balance += $coins;
        $recipientWallet->save();


        return redirect(route('myWalks'))->with('message', 'Pomyślnie dokonano płatności i zakończono spacer');
    }

}
