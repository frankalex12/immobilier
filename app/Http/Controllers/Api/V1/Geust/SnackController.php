<?php

namespace App\Http\Controllers\Api\V1\Geust;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\SnackCollection;
use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    public function __invoke()
    {
        try {
            $snacks = Snack::with('bien', 'bien.proprietaire','horaires','produitSnacks','evenementSnack','bien.images')->paginate(10);
            return response()->json($snacks, 200);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'], 500);
        }
    }
}
