<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackItemsRequest;
use App\Models\Hotel;
use App\Models\Pack;
use App\Models\PackItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackItemsController extends Controller
{
    /**
     * Display a listing of the resource.ok
     */
    public function index()
    {
        try {
            return response()->json(PackItems::paginate(10), 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Store a newly created resource in storage. ok
     */
    public function store(PackItemsRequest $request, Hotel $hotel, Pack $pack)
    {
        try {
            $file = $request->hasFile('path') ? $request->file('path')->store('images/hotel/PackItems') : null;
            $pack = PackItems::create([
                'items_name' => $request->items_name,
                'path' => $file,
                'App\Models\Pack' => $pack->id,
            ]);
            return response()->json(['data' => $pack, 'message' => 'Success !'], 201);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(PackItemsRequest $request, Hotel $hotel, Pack $pack, PackItems $packItems)
    {
        try {
            // if ($request->hasFile('path')) {

        //         Storage::disk('local')->delete($packItems->path);

        //         $file = $request->file('path')->store('images/hotel/pack');
        //     } else {

        //         $file =  $pack->path;
        //     }

            $packItems->update([

                'items_name' => $request->items_name
            ]);

            return response()->json('Modifier avec Succes !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel, Pack $pack, PackItems $packItems)
    {
        try {
            // if (file_exists($packItems->path)) {
                // Storage::disk('local')->delete($packItems->path);
                $packItems->delete();
            // }
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
