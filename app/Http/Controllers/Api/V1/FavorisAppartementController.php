<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavorisAppartementRequest;
use App\Models\Favoris_appartement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavorisAppartementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store(FavorisAppartementRequest $request)
    {
        try {
            $favoris = Favoris_appartement::create([
                'user_id' => Auth::user()->id,
                'appartements_id' => $request->appartements_id
            ]);
            return response()->json(['data' => $favoris, 'message' => 'Ajouter avec success !'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function index()
    {
        try {
            $favoris_appartement = User::with('favoris_appartements')->findOrFail(Auth::user()->id);
            return response()->json(['data' => $favoris_appartement, 'message' => 'Appartements en favoris !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function destroy(Favoris_appartement $favoris_appartement)
    {
        try {
            $favoris_appartement->delete();
            return response()->json(['message' => 'Supprimer avec success !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
}
