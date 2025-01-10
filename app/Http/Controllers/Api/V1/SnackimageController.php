<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BienImageRequest;
use App\Models\BienImg;
use App\Models\Snack;
use Illuminate\Http\Request;

class SnackimageController extends Controller
{
    public function __invoke(BienImageRequest $request, Snack $snack)
    {
        try {
            $file = $request->file('path')->store('images/snacks');
            $image = BienImg::create(['bien_id' => $snack->bien_id, 'path' => $file, 'name' => $request->name]);
            return response()->json(['message' => 'Enregistrer avec succes !', 'data' => $image], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation'], 500);
        }
    }
}
