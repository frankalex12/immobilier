<?php

namespace App\Http\Controllers\Api\V1\Geust;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AppartementResource;
use App\Models\Appartement;

class AppartementController extends Controller
{

    public function __invoke()
    {
        try {
            return response()->json(AppartementResource::collection(Appartement::paginate(10)), 201);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'], 500);
        }
    }
}
