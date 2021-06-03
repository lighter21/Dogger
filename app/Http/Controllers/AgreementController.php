<?php

namespace App\Http\Controllers;

use App\Agreement;
use App\Walk;
use App\User;

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
        $acceptedAgreement2 = 0;
        $acceptedUser3 = 0;
        $acceptedWalks1 = Walk::where([
            'user_id' => auth()->id(),
            'done' => false,
            ])->first();
        if($acceptedWalks1) {
            $acceptedAgreement2 = Agreement::where([
                'walk_id' => $acceptedWalks1->id,
                'active' => true,
            ])->first();
        }
        if($acceptedAgreement2){
            $acceptedUser3 = User::where([
                'id' => $acceptedAgreement2->tenant_id,
            ])->get();
        }


//          Zarezerwowane, akceptowane
        $acceptedWalks = Walk::with(['agreement', 'pet'])
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

        return view('user.myWalks', ['pendingWalks'=>$pendingWalks,'acceptedWalks'=> $acceptedWalks, 'doneWalks'=>$doneWalks, 'activeWalks'=>$activeWalks, 'acceptedWalks1'=>$acceptedWalks1, 'acceptedAgreement2'=>$acceptedAgreement2, 'acceptedUser3'=>$acceptedUser3]);
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
//        Zarezerwowane, oczekujące na akceptacje
        $pendingAgreements = Walk::with(['pet', 'agreement'])
            ->where([
                'done' => false,
            ])
            ->whereHas('agreement', function ($q) {
                $q->where([
                    'tenant_id' => auth()->id(),
                    'active' => false
                ]);
            })->get();

//        Zarezerwowane, akceptowane
        $acceptedAgreements = Walk::with(['pet', 'agreement'])
            ->where([
                'done' => false,
            ])
            ->whereHas('agreement', function ($q) {
                $q->where([
                    'tenant_id' => auth()->id(),
                    'active' => true,
                ]);
            })->get();



//        Zakończone zlecenia
        $doneAgreements = Walk::with(['pet', 'agreement'])
            ->where([
                'done' => true,
            ])
            ->whereHas('agreement', function ($q) {
                $q->where([
                    'tenant_id' => auth()->id(),
                ]);
            })->get();




        return view('user.myAgreements', ['pendingAgreements'=>$pendingAgreements,'acceptedAgreements'=> $acceptedAgreements, 'doneAgreements'=>$doneAgreements]);

    }
}
