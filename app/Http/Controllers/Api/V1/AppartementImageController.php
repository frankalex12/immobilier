<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BienImageRequest;
use App\Models\Appartement;
use App\Models\BienImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppartementImageController extends Controller
{

    public function __invoke(BienImageRequest $request, Appartement $appartement)
    {
        try {
            $file = $request->file('path')->store('images/Appartements');
            $image = BienImg::create(['bien_id' => $appartement->bien_id, 'path' => $file, 'name' => $request->name]);
            return response()->json(['message' => 'Enregistrer avec succes !', 'data' => $image], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation'], 500);
        }
    }
}
