<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BienImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteBienImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BienImg $bienImg)
    {
        try {

            // if (file_exists($bienImg->path)) {

                // Storage::disk('local')->delete($bienImg->path);

                $bienImg->delete();
            // }
            return response()->json(['supprimer avec succes'], 200);

        } catch (\Throwable $th) {

            return response()->json(['Echec d\'Operation'], 500);
        }
        return response()->json(['message' => 'supprimer avec success !'], 200);
    }
}
