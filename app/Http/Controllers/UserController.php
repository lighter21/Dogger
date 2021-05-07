<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
//    private function validateRequest($rq){
//        return $validatedData = $rq->validate([
//            'pet_id' => 'exists:pets,id',
//            'date' => 'required|date|after_or_equal:now',
//            'description' => ''
//        ]);
//    }
    private function validateRequest($rq)
    {
        return $validatedData = $rq->validate( [
            'street' => 'required|min:2|max:50',
            'house_number' => 'required|min:1|max:10',
            'postcode' => 'required|min:2|max:15',
            'city' => 'required|min:2|max:80',
            'phone_number' => 'required|min:8|max:12|numeric'
        ]);
    }

    public function edit($id)
    {
        $databaseData=Users::find($id);
        return view('user.edit', ['databaseData' => $databaseData]);
    }
    public function update($id, Request $request)
    {
        $validatedRequest = $this->validateRequest($request);

        $invoice=User::find($id);
        $invoice->street=$validatedRequest->street;
        $invoice->house_number=$validatedRequest->house_number;
        $invoice->postcode=$validatedRequest->postcode;
        $invoice->city=$validatedRequest->city;
        $invoice->phone_number=$validatedRequest->phone_number;
        $invoice->save();

        return redirect('home');
    }

}
