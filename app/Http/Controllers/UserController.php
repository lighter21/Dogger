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
    private function validateRequest($rq)
    {
        return $validatedData = $rq->validate( [
            'street' => 'required|min:2|max:50',
            'house_number' => 'required|min:1|max:10',
            'postcode' => 'required|min:2|max:15',
            'city' => 'required|min:2|max:80',
            'phone_number' => 'required|numeric|min:8'
        ]);
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $validatedRequest = $this->validateRequest($request);
        try {
            User::create([
                "street" => $validatedRequest->street,
                "house_number" => $validatedRequest->house_number,
                "postcode" => $validatedRequest->postcode,
                "city" => $validatedRequest->city,
                "phone_number" => $validatedRequest->phone_number
            ]);
        }catch (Exception $exception) {
            return redirect()->back()->with('error', 'Adres nie został dodany. Spróbuj ponownie później');
        }
        return redirect('home')->with('message', 'Adres został pomyślnie dodany');
    }

    public function edit($id)
    {
        $databaseData=User::find($id);
        return view('user.edit', ['databaseData' => $databaseData]);
    }
    public function update($id, Request $request)
    {
        $validatedRequest = $this->validateRequest($request);

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
