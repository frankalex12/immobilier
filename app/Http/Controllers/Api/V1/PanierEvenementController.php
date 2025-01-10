<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\EvenementSnack;
use App\Models\Pack;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierEvenementController extends Controller
{
            /**
     * Handle the incoming request.
     */
    public function __invoke(EvenementSnack $evenementSnack)
    {
        // try {
            $panier1 = new Panier([ 'user_id' => Auth::user()->id, 'prix' =>$evenementSnack->prix  ]);
            EvenementSnack::find($evenementSnack->id)->panier()->save($panier1);
            return response()->json(['message'=>'evenement ajouter Avec Success !'], 200);
        // } catch (\Throwable $th) {
        //     return response()->json('Echec d\'Operation !', 500);
        // }
    }
}
