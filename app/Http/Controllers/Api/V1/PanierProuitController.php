<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PanierProduitRequest;
use App\Http\Requests\PanierRequest;
use App\Models\Appartement;
use App\Models\Chambre;
use App\Models\Panier;
use App\Models\ProduitSnack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierProuitController extends Controller
{
    public function index()
    {
        try {
           $prix= Panier::where([['commander','=',0],['user_id','=',Auth::user()->id]])->with('panierable')->sum('prix');
            return response()->json(['total'=>$prix,'panier'=>Panier::where([['commander','=',0],['user_id','=',Auth::user()->id]])->with('panierable')->get()], 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PanierProduitRequest $request, ProduitSnack $produitSnack)
    {
        try {
            $panier1 = new Panier([ 'debut' => $request->debut,'fin' => $request->debut, 'user_id' => Auth::user()->id,'prix'=>$produitSnack->prix]);
            $panier2= ProduitSnack::find($produitSnack->id)->panier()->save($panier1);
            return response()->json(['message'=>'produit ajouter Avec Success !'], 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
            // $panier1 = new Panier(['fin' => '2024/12/12', 'debut' => '2024/12/1', 'user_id' => Auth::user()->id,'prix'=>100000]);

        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panier $panier)
    {
        try {
            $panier->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
