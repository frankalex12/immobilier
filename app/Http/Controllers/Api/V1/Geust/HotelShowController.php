<?php

namespace App\Http\Controllers\Api\V1\Geust;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelShowController extends Controller
{
    public function __invoke(Hotel $hotel)
    {
        try {
            $hotel = Hotel::with('bien.proprietaire','chambres','bien.images')->findOrFail($hotel->id);
            return response()->json($hotel, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Ressource introuvable !'], 500);
        }
    }
}
