<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\PackHotelRequest;
use App\Models\Hotel;
use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PackHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json(Pack::paginate(10), 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackHotelRequest $request, Hotel $hotel)
    {
        try {
            $file = $request->hasFile('path') ? $request->file('path')->store('images/hotel/pack') : null;
            $pack = Pack::create([
                'prix' => $request->prix,
                'type' => $request->type,
                'path' => $file,
                'App\Models\Hotel' => $hotel->id,
            ]);
            return response()->json(['data' => $pack, 'message' => 'Success !'], 201);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

  /**
     * Display the specified resource. ok
     */
    public function show(Hotel $hotel, Pack $pack)
    {
        return response()->json([Pack::findOrFail($pack->id)], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackHotelRequest $request, Hotel $hotel, Pack $pack)
    {
        try {

            if ($request->hasFile('path')) {
                Storage::disk('local')->delete($pack->path);
                $file = $request->file('path')->store('images/hotel/pack');
            } else {
                $file =  $pack->path;
            }
            $pack->update([
                'prix' => $request->prix,
                'type' => $request->type,
                'path' => $file,
            ]);
            return response()->json('Modifier avec Succes !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel, Pack $pack)
    {
        try {
            // if (file_exists($pack->path)) {
                Storage::disk('local')->delete($pack->path);
                $pack->delete();
            // }
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
