<?php

namespace App\Http\Controllers\Api\V1\Geust;

use App\Http\Controllers\Controller;
use App\Models\Pack;
use App\Models\Snack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function __invoke()
    {
        try {
            $snacks = Pack::with('hotel')->paginate(10);
            return response()->json($snacks, 200);
        } catch (\Throwable $th) {
            return response()->json(['echec D\'Operation'], 500);
        }
    }
}
