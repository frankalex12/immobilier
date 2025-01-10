<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PanierProduitRequest;
use App\Http\Requests\PanierRequest;
use App\Models\Pack;
use App\Models\Panier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierPackController extends Controller
{
        /**
     * Handle the incoming request.
     */
    public function __invoke(PanierProduitRequest $request, Pack $pack)
    {
        try {
            $debut = Carbon::createFromFormat('Y/m/d',$request->debut);
            $panier1 = new Panier(['debut' => $request->debut,  'user_id' => Auth::user()->id, 'prix' =>$pack->prix  ]);
            Pack::find($pack->id)->panier()->save($panier1);
            return response()->json(['message'=>'pack ajouter Avec Success !'], 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
