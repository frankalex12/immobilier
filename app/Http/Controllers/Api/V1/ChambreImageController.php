<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChambreImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Appartement $appartement)
    {
        try {
            $file = $request->file('path')->store('images/hotels/chambres');
            $image = BienImg::create(['bien_id' => $appartement->bien_id, 'path' => $file, 'name' => $request->name]);
            return response()->json(['message' => 'Enregistrer avec succes !', 'data' => $image], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation'], 500);
        }
    }
}
