<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Commande_panier;
use App\Models\Panier;
use Illuminate\Http\Request;

class CommandeDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Commande $commande)
    {
        try {
             return response()->json(['panier'=>Commande_panier::where([['App\Models\Commande','=',$commande->id]])->with('paniers.panierable')->get()], 200);
         } catch (\Throwable $th) {
             return response()->json('Echec d\'Operation !', 500);
         }
    }
}
