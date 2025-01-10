<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BienImageRequest;
use App\Models\BienImg;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelImageController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(BienImageRequest $request, Hotel $hotel, BienImg $bienImg)
    {
        try {
            $file = $request->file('path')->store('images/hotels');
            $image = BienImg::create(['bien_id' => $hotel->bien_id, 'path' => $file, 'name' => $request->name]);
            return response()->json(['message' => 'Enregistrer avec succes !','data' => $image ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

}
