<?php

namespace App\Http\Controllers;

use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        $wallet = Wallet::firstOrCreate(
            ["user_id" => $userId],
            ["account_balance" => 0.00]
        );
        $user = auth()->user();
        return view('home',['wallet'=>$wallet]);
    }
}
