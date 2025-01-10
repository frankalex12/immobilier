<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ChambreResource;
use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Chambre $chambre)
    {
        try {
            return response()->json([new ChambreResource($chambre)],201);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'],500);
        }
    }
}
