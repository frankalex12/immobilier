<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavorisProduitRequest;
use App\Models\Favoris_produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorisProuitController extends Controller
{
  /**
     * Handle the incoming request.
     */
    public function store(FavorisProduitRequest $request)
    {
        try {
            $favoris = Favoris_produit::create([
                'user_id' => Auth::user()->id,
                'produit_snack_id' => $request->produit_snack_id
            ]);
            return response()->json(['data' => $favoris, 'message' => 'Ajouter avec success !'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function index()
    {
        try {
            $favoris_produit = User::with('Favoris_produits.produit')->findOrFail(Auth::user()->id);
            return response()->json(['data' => $favoris_produit, 'message' => 'Produits en favoris !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function destroy(Favoris_produit $favoris_produit)
    {
        try {
            $favoris_produit->delete();
            return response()->json(['message' => 'Supprimer avec success !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
}
