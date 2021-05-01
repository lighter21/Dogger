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
    public function show_delete()
    {
        $database_data = Pet::all();
        return view('pet/show_delete', ['database_data' => $database_data]);
    }
    public function delete($id)
    {
        $database_data=Pet::find($id);
        $database_data -> delete();
        return redirect('show_delete') -> with('message', 'Zwierzak usunięty!');
    }
}
