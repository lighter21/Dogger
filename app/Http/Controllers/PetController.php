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
        return view('pet.create');
    }
    public function validation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:30',
            'type' => 'required',
            'breed' => 'required'
        ]);
        return $request;
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
            "name" => $request->name,
            "type" => $request->type,
            "breed" => $request->breed

        ]);
        return redirect('home')->with('message', 'Zwierzak został dodany!');
    }
    public function index()
    {
        $userId = auth()->user()->id;
        $databaseData = Pet::where('user_id',$userId)->get();
        return view('pet/index', ['databaseData' => $databaseData]);
    }
    public function destroy($id)
    {
        $databaseData=Pet::find($id);
        $databaseData -> delete();
        return redirect('index');
    }

    public function edit($id)
    {
        $databaseData=Pet::find($id);
        return view('pet.edit', ['databaseData' => $databaseData]);
    }
    public function update($id, Request $request)
    {
        $validatedRequest=$this->validation($request);

        $invoice=Pet::find($id);
        $invoice->name=$validatedRequest->name;
        $invoice->type=$validatedRequest->type;
        $invoice->breed=$validatedRequest->breed;
        $invoice->save();

        return redirect('index');
    }

}
