<?php

namespace App\Http\Controllers;

use App\Walk;
use Illuminate\Http\Request;
use Mockery\Exception;
use function Couchbase\passthruEncoder;

class WalkController extends Controller
{
    public function index() {
        $user = auth()->user();
        $walks = Walk::with(['pet', 'agreement'])->where('user_id', '<>', auth()->id())->whereDoesntHave('agreement')->get();
        return view('walk.index', ['walks'=>$walks]);
    }

    public function show($walkId) {
        $walk = Walk::where('id', $walkId )->first();
        if (!$walk) abort(404);
        $pet = $walk->pet;
        $user = auth()->user();
        return view('walk.show', ['walk'=>$walk]);
    }

    public function create() {
        $myPets = auth()->user()->pets;
        if (!$myPets) abort(404);
        return view('walk.create', ['myPets' => $myPets]);
    }

    public function store(Request $rq) {
        $walk = $this->validateRequest($rq);
        try {
            Walk::create([
                'user_id' => auth()->id(),
                'pet_id' => $walk['pet_id'],
                'done' => false,
                'date' => $walk['date'],
                'description' =>$walk['description']
            ]);
        }catch (Exception $exception) {
            return redirect()->back()->with('error', 'Spacer nie został dodany. Spróbuj ponownie później');
        }
        return redirect(route('indexWalks'))->with('message', 'Spacer został pomyślnie dodany');

    }

    //        TODO: usuwanie i edycja spacerów dopiero kiedy będzie podstawowy panel użytkownika
    public function edit() {
        return view('walk.edit');
    }

    public function update() {

    }

    public function destroy() {

    }

    private function validateRequest($rq){
       return $validatedData = $rq->validate([
            'pet_id' => 'exists:pets,id',
            'date' => 'required|date|after_or_equal:now',
            'description' => ''
        ]);
    }

}
