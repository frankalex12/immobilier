<?php

namespace App\Http\Controllers\Api\V1\Geust;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\TerrainCollection;
use App\Http\Resources\Api\V1\TerrainResource;
use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    public function __invoke()
    {
        try {
            return response()->json(new TerrainCollection(Terrain::paginate(10)), 200);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'], 500);
        }
    }
}
