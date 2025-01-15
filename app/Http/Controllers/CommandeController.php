<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Models\Commande;
use App\Models\Commande_panier;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function store(CommandeRequest $request)
    {
        try {

            $prix = Panier::where([['commander', '=', 0], ['user_id', '=', Auth::user()->id]])->sum('prix');

            $commande = Commande::create(array_merge( $request->validated(),[ 'amount' =>$prix ],['user_id'=> Auth::user()->id]));

            $items = Panier::where([['commander', '=', 0], ['user_id', '=', Auth::user()->id]])->get();

            foreach ($items as $item) {

                Commande_panier::create(['App\Models\Commande' => $commande->id, 'App\Models\Panier'  => $item->id]);

                 $item->commander=1;

                 $item->save();
            }
            return response()->json(['message commande effectuer avec Success !'], 200);

        } catch (\Throwable $th) {

            return response()->json('Echec d\'Operation !', 500);
        }
    }



    public function annuler(Commande $commande)
    {
        try {

            $commande->state = 'annuler';

            $commande->save();

            return response()->json([$commande], 201);

        } catch (\Throwable $th) {

            return response()->json('Echec d\'Operation !', 500);
        }
    }



    public function index()
    {
        try {
            return response()->json(['commande'=>Commande::with('')->findOrFail(Auth::user()->id)->reverse()], 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
