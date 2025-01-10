<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavorisChambreRequest;
use App\Models\Favoris_chambre;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavorisChambreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store(FavorisChambreRequest $request)
    {
        try {
            $favoris = Favoris_chambre::create([
                'user_id' => Auth::user()->id,
                'chambre_id' => $request->chambre_id
            ]);
            return response()->json(['data' => $favoris, 'message' => 'Ajouter avec success !'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function index()
    {
        try {
            $favoris_appartement = User::with('favoris_chambres.chambre','favoris_chambres.chambre.hotel')->findOrFail(Auth::user()->id);
            return response()->json(['data' => $favoris_appartement, 'message' => 'Chambres en favoris !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function destroy(Favoris_chambre $favoris_chambre)
    {
        try {
            $favoris_chambre->delete();
            return response()->json(['message' => 'Supprimer avec success !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
}
