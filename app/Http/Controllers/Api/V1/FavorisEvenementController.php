<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavorisEvenementRequest;
use App\Models\Favoris_evenement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorisEvenementController extends Controller
{


     /**
     * Handle the incoming request.
     */
    public function store(FavorisEvenementRequest $request)
    {
        try {
            $favoris = Favoris_evenement::create([
                'user_id' => Auth::user()->id,
                'evenement_snack_id' => $request->evenement_snack_id
            ]);
            return response()->json(['data' => $favoris, 'message' => 'Ajouter avec success !'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function index()
    {
        try {
            $favoris_evenement = User::with('Favoris_evenements.evenement')->findOrFail(Auth::user()->id);
            return response()->json(['data' => $favoris_evenement, 'message' => 'Evenements en favoris !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function destroy(Favoris_evenement $favoris_evenement)
    {
        try {
            $favoris_evenement->delete();
            return response()->json(['message' => 'Supprimer avec success !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }

}
