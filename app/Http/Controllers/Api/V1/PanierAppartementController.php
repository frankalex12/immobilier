<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PanierRequest;
use App\Models\Appartement;
use App\Models\Panier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierAppartementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PanierRequest $request, Appartement $appartement)
    {
        try {
            $debut = Carbon::createFromFormat('Y/m/d',$request->debut);
            $fin = Carbon::createFromFormat('Y/m/d',$request->fin);
            $panier1 = new Panier(['debut' => $request->debut, 'fin' => $request->fin, 'user_id' => Auth::user()->id, 'prix' =>abs( $appartement->MontantMensuel * ( $debut->diffInMonths($fin)) ) ]);
            $panier3 = Appartement::find($appartement->id)->panier()->save($panier1);
            return response()->json(['message'=>'Appartement ajouter Avec Success !'], 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
