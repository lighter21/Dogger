<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('pages/create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'breed' => 'required'
        ]);

        Pet::create([
            "user_id" => $userId = Auth::id(),
            "name" => $request->input('name'),
            "type" => $request->input('type'),
            "breed" => $request->input('breed')

        ]);
        return redirect('home') -> with('message', 'Zwierzak został dodany!');
    }
}
