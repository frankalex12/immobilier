<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AppartementResource;
use App\Models\Appartement;
use Illuminate\Http\Request;

class AppartementShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Appartement $location)
    {
        try {
            return response()->json([new AppartementResource($location)],201);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'],500);
        }
    }
}
