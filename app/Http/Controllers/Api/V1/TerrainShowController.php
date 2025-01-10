<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\TerrainResource;
use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Terrain $terrains)
    {
        try {
            return response()->json([new TerrainResource($terrains)],200);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'],500);
        }
    }
}
