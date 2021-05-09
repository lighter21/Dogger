<?php

namespace App\Http\Controllers;

use App\Agreement;
use App\Walk;

class AgreementController extends Controller
{
    public function bookWalk($walkId)
    {
        $walk = Walk::where('id', $walkId)->firstOrFail();
        $createdAgreement = Agreement::where('walk_id', $walkId)->first();
        if ($createdAgreement) return redirect()->back()->with('message', 'Ten spacer został już zarezerwowany, spróbuj kiedy indziej');
        Agreement::create([
            'walk_id' => $walkId,
            'pet_id' => $walk->pet->id,
            'tenant_id' => auth()->id(),
            'active' => false
        ]);
        return redirect()->back()->with('message', 'Spacer został zarezerwowany. Zostaniesz ponownie powiadomiony, kiedy spacer zostanie potwierdzony przez wystawiającego.');
    }

    public function myWalks()
    {
//        Spacery dodane przez użytkownika!

//        Zarezerwowane, oczekujące na akceptacje
        $pendingWalks = Walk::with(['pet', 'agreement'])
            ->where([
                'user_id' => auth()->id(),
                'done' => false,
            ])
            ->whereHas('agreement', function ($q) {
                $q->where([
                    'active' => false,
                ]);
            })->get();

//          Zarezerwowane, akceptowane
        $acceptedWalks = Walk::with(['pet', 'agreement'])
            ->where([
                'user_id' => auth()->id(),
                'done' => false,
            ])
            ->whereHas('agreement', function ($q) {
                $q->where([
                    'active' => true,
                ]);
            })->get();

//        Aktywne ogłoszenia o spacer do wynajęcia
        $activeWalks = Walk::with(['pet', 'agreement'])
            ->where([
                'user_id' => auth()->id(),
                'done' => false,
            ])
            ->whereDoesntHave('agreement')
            ->get();

//        Zakończone spacery
        $doneWalks = Walk::with(['pet', 'agreement'])
            ->where([
                'user_id' => auth()->id(),
                'done' => true,
            ])->get();

        return view('user.myWalks', ['pendingWalks'=>$pendingWalks,'acceptedWalks'=> $acceptedWalks, 'doneWalks'=>$doneWalks, 'activeWalks'=>$activeWalks]);
    }

    public function acceptWalk($walkId)
    {
      $agreement = Agreement::where('walk_id', $walkId)->firstOrFail();
      $agreement->active = true;
      $agreement->save();
      return redirect()->back()->with('message', 'Pomyślnie zaakceptowano spacer');
    }

    public function declineWalk($walkId)
    {
        $agreement = Agreement::where('walk_id', $walkId)->firstOrFail();
        $agreement->delete();
        return redirect()->back()->with('message', 'Anulowano spacer');
    }

    public function myAgreements()
    {
        return view('user.myAgreements');
    }
}
