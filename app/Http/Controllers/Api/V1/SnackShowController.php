<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\SnackResource;
use App\Models\Snack;
use Illuminate\Http\Request;

class SnackShowController extends Controller
{
    public function __invoke(Snack $snack)
    {
        try {
            $snack = Snack::with('bien.proprietaire','horaires','produitSnacks','evenementSnack','bien.images')->findOrFail($snack->id);
            return response()->json([$snack],200);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'],500);
        }
    }

}
