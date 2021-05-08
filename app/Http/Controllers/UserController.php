<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    private function validateRequest(Request $rq)
    {
        $this->validate($rq, [
            'street' => 'required|min:2|max:50',
            'house_number' => 'required|min:1|max:10',
            'postcode' => 'required|min:2|max:15',
            'city' => 'required|min:2|max:80',
            'phone_number' => 'required|numeric|min:8'
        ]);
        return $rq;
    }

    public function edit()
    {
        $id = Auth::id();
        $databaseData=User::find($id);
        return view('user.edit', ['databaseData' => $databaseData]);
    }
    public function update(Request $request)
    {
        $validatedRequest = $this->validateRequest($request);
        $id = Auth::id();

        $user=User::find($id);
        $user->street = $validatedRequest->street;
        $user->house_number = $validatedRequest->house_number;
        $user->postcode = $validatedRequest->postcode;
        $user->city = $validatedRequest->city;
        $user->phone_number = $validatedRequest->phone_number;
        $user->save();

        return redirect('home');
    }
}
