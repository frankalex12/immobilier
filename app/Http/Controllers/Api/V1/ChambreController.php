<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ChambreStoreRequest;
use App\Http\Resources\Api\V1\ChambreCollection;
use App\Http\Resources\Api\V1\ChambreResource;
use App\Http\Resources\Api\V1\HotelResource;
use App\Models\Chambre;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource. ok
     */
    public function index(Hotel $hotel)
    {
        return response()->json([new ChambreCollection($hotel->chambres)], 200);
    }

    /**
     * Store a newly created resource in storage. ok
     */
    public function store(ChambreStoreRequest $request, Hotel $hotel)
    {
        try {
            $file= $request->hasFile('image')? $request->file('image')->store('images/chambre/avant'): null;
            $chambre = Chambre::create([
                 'type' => $request->type,
                 'superficie' => $request->superficie,
                 'image' =>   $file,
                 'prixJour' => $request->prixJour,
                 'prixNuit' => $request->prixNuit,
                 'Offres' => $request->Offres,
                 'reduction' => $request->reduction,
                 'hotel_id' => $hotel->id,
             ]);
            return response()->json(['data'=>$chambre,'message' => 'Success !'], 201);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Display the specified resource. ok
     */
    public function show(Hotel $hotel, Chambre $chambre)
    {
        return response()->json([new ChambreResource($chambre)], 200);

    }

    /**
     * Update the specified resource in storage. ok
     */
    public function update(ChambreStoreRequest $request, Hotel $hotel, Chambre $chambre)
    {
        try {
            if ($request->hasFile('image')) {
               $file =$request->file('image')->store('images/chambre/avant');
            } else {
               $file = $chambre->image;
            }
            $chambre->update(
                [
                    'type' => $request->type,
                    'superficie' => $request->superficie,
                    'image' =>  $file,
                    'prixJour' => $request->prixJour,
                    'prixNuit' => $request->prixNuit,
                    'Offres' => $request->Offres,
                    'reduction' => $request->reduction,
                    'hotel_id' => $hotel->id,
                ]
            );
            return response()->json(['message' => 'Modifier avec Success !'], 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Remove the specified resource from storage. ok
     */
    public function destroy(Hotel $hotel, Chambre $chambre)
    {
        try {
            $chambre->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
