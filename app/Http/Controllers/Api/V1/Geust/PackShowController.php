<?php

namespace App\Http\Controllers\Api\V1\Geust;

use App\Http\Controllers\Controller;
use App\Models\Pack;
use Illuminate\Http\Request;

class PackShowController extends Controller
{
    public function __invoke(Pack $pack)
    {
        try {
            // $packs = Pack::with('')->findOrFail($pack->id);
            return response()->json([$pack],200);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'],500);
        }
    }
}
