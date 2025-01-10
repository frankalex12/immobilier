<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavorisTerrainRequest;
use App\Models\Favoris_terrain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorisTerrainController extends Controller
{
     /**
     * Handle the incoming request.
     */
    public function store(FavorisTerrainRequest $request)
    {
        try {
            $favoris = Favoris_terrain::create([
                'user_id' => Auth::user()->id,
                'terrain_id' => $request->terrain_id
            ]);
            return response()->json(['data' => $favoris, 'message' => 'Ajouter avec success !'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function index()
    {
        try {
            $favoris_terrain = User::with('favoris_terrains.terrain')->findOrFail(Auth::user()->id);
            return response()->json(['data' => $favoris_terrain, 'message' => 'Chambres en favoris !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
    public function destroy(Favoris_terrain $favoris_terrain)
    {
        try {
            $favoris_terrain->delete();
            return response()->json(['message' => 'Supprimer avec success !'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
        }
    }
}
