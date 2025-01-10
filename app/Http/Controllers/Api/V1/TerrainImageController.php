<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ImageBienStoreRequest;
use App\Http\Requests\BienImageRequest;
use App\Models\BienImg;
use App\Models\Terrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TerrainImageController extends Controller
{

    public function __invoke(BienImageRequest $request, Terrain $terrain, BienImg $bienImg)
    {
        try {
            $file = $request->file('path')->store('images/Terrains');
            $image = BienImg::create(['bien_id' => $terrain->bien_id, 'path' => $file, 'name' => $request->name]);
            return response()->json(['message' => 'Enregistrer avec succes !', 'data' => $image], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation'], 500);
        }
    }

}
