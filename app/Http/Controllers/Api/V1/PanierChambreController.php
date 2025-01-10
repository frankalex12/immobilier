<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PanierRequest;
use App\Models\Chambre;
use App\Models\Panier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PanierChambreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PanierRequest $request, Chambre $chambre)
    {
        try {
            $debut = Carbon::createFromFormat('Y/m/d',$request->debut);
            $fin = Carbon::createFromFormat('Y/m/d',$request->fin);
            $panier1 = new Panier(['debut' => $request->debut, 'fin' => $request->fin, 'user_id' => Auth::user()->id, 'prix' =>abs( $chambre->prixJour * ( $debut->diffInDays($fin)) ) ]);
            Chambre::find($chambre->id)->panier()->save($panier1);
            return response()->json(['message'=>'Chambre ajouter Avec Success !',$panier1->prix], 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
