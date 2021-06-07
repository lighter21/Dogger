<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Walk;
use Illuminate\Http\Request;
use Mockery\Exception;

class WalkController extends Controller
{
    public function index()
    {
        $walks = Walk::with(['pet', 'agreement'])->where('user_id', '<>', auth()->id())->whereDoesntHave('agreement')->get();
        return view('walk.index', ['walks' => $walks]);
    }

    public function show($walkId)
    {
        $walk = Walk::where('id', $walkId)->first();
        if (!$walk) abort(404);
        $pet = $walk->pet;
        return view('walk.show', ['walk' => $walk]);
    }

    public function create()
    {
        $myPets = Pet::where('user_id', auth()->id())->get();
        return view('walk.create', ['myPets' => $myPets]);
    }

    public function store(Request $rq)
    {
        $walk = $this->validateRequest($rq);
        try {
            Walk::create([
                'user_id' => auth()->id(),
                'pet_id' => $walk['pet_id'],
                'payment' => $walk['payment'],
                'done' => false,
                'date' => $walk['date'],
                'description' => $walk['description']
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Spacer nie został dodany. Spróbuj ponownie później');
        }
        return redirect(route('indexWalks'))->with('message', 'Spacer został pomyślnie dodany');

    }

    public function edit()
    {
        return view('walk.edit');
    }

    public function update()
    {

    }

    public function destroy($walkId)
    {
        $walk = Walk::find($walkId);
        $walk->delete();
        return redirect()->back();
    }

    private function validateRequest($rq)
    {
        return $validatedData = $rq->validate([
            'pet_id' => 'exists:pets,id',
            'date' => 'required|date|after_or_equal:now',
            'payment' => 'required|numeric|between:0,99999999.99',
            'description' => 'required'
        ]);
    }

}
