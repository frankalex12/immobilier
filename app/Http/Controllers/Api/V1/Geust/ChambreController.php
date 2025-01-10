<?php

namespace App\Http\Controllers\Api\V1\Geust;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ChambreCollection;
use App\Models\Chambre;

class ChambreController extends Controller
{
    public function __invoke()
    {
        try {
            return response()->json(new ChambreCollection(Chambre::paginate(10)), 201);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'
        ], 500);
        }
    }
}
