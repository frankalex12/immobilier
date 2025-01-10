<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\HotelStoreRequest;
use App\Http\Resources\Api\V1\HotelResource as V1HotelResource;
use App\Models\Bien;
use App\Models\Hotel;
use App\Models\Proprietaire;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource. ok
     */
    public function index()
    {
        try {
            // DB::beginTransaction();
            $hotel = Hotel::with('bien', 'bien.proprietaire')->paginate(10);
            return response()->json($hotel, 200);
            // DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Ressource introuvable !'], 500);
            // DB::rollBack();
        }
    }

    /**
     * Store a newly created resource in storage. ok
     */
    public function store(HotelStoreRequest $request)
    {
        try {
            // DB::beginTransaction();
            $proprietaire = Proprietaire::create($request->validated());
            $image = $file = $request->hasFile('ImageAvant') ? $request->file('ImageAvant')->store('images/Hotels/avant') : null;
            $bien = Bien::create([
                'titre' => $request->titre,
                'quatier' => $request->quatier,
                'adress' => $request->adress,
                'accessService' => $request->accessService,
                'ImageAvant' => $image,
                'proprietaire_id' => $proprietaire->id
            ]);
            $hotel = Hotel::create(array_merge($request->validated(), ['bien_id' => $bien->id]));
            return response()->json(['data' => new V1HotelResource($hotel), 'message' => 'Ressource enregistrer avec Success !'], 201);
            // DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation !'], 500);
            // DB::rollBack();
        }
    }

    /**
     * Display the specified resource. ok
     */
    public function show(Hotel $hotel)
    {
        try {
            DB::beginTransaction();
            return response()->json(new V1HotelResource($hotel), 200);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation'], 500);
            DB::rollBack();
        }
    }

    /**
     * Update the specified resource in storage. ok
     */
    public function update(HotelStoreRequest $request, Hotel $hotel)
    {
        try {
            DB::beginTransaction();
            $hotel->update($request->validated());
            $bien = Bien::find($hotel->bien_id);
            $bien->update([
                'titre' => $request->titre,
                'quatier' => $request->quatier,
                'adress' => $request->adress,
                'accessService' => $request->accessService,
                // 'ImageAvant' => $file = $request->hasFile('ImageAvant') ? $request->file('ImageAvant')->store('images/Terrains/avant') : null
            ]);
            Proprietaire::find($bien->proprietaire_id)->update($request->validated());
            return response()->json(['message' => 'resource Modifier avec success !'], 200);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        try {
            DB::beginTransaction();
            $hotel->delete();
            return response()->json(['message' => 'Ressource Supprimer !'], 200);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation !'], 500);
            DB::rollBack();
        }
    }
}
