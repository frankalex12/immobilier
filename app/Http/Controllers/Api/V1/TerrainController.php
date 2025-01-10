<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TerrainStoreRequest;
use App\Http\Resources\Api\V1\TerrainResource;
use App\Models\Bien;
use App\Models\Proprietaire;
use App\Models\Terrain;
use Illuminate\Support\Facades\DB;

class TerrainController extends Controller
{
    /**
     * Display a listing of the resource. ok
     */
    public function index()
    {
        try {
            DB::beginTransaction();
            $terrains = Terrain::with('bien', 'bien.proprietaire')->paginate(10);
            return response()->json($terrains, 200);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec D\'Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Store a newly created resource in storage. ok
     */
    public function store(TerrainStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $proprietaire = Proprietaire::create($request->validated());
            $image = $file= $request->hasFile('ImageAvant')?$request->file('ImageAvant')->store('images/Terrains/avant'):null;
            $bien = Bien::create([
                'titre' => $request->titre,
                'quatier' => $request->quatier,
                'adress' => $request->adress,
                'accessService' => $request->accessService,
                'ImageAvant' => $image,
                'proprietaire_id' => $proprietaire->id
            ]);
            $terrain = Terrain::create(array_merge($request->validated(), ['bien_id' => $bien->id]));
            return response()->json([
                'data' => new TerrainResource($terrain),
                'message' => 'resource crée avec succes !'
            ], 200);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource. ok
     */
    public function show(Terrain $terrain)
    {
        return response()->json(new TerrainResource($terrain), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TerrainStoreRequest $request, Terrain $terrain)
    {
        try {
            DB::beginTransaction();
            $terrain->update($request->validated());
            $bien = Bien::find($terrain->bien_id);
            $bien->update([
                'titre' => $request->titre,
                'quatier' => $request->quatier,
                'adress' => $request->adress,
                'accessService' => $request->accessService,
            ]);
            Proprietaire::find($bien->proprietaire_id)->update($request->validated());
            return response()->json(['message'=>'Ressource modifier avec success !'], 200);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message'=>'Echec d\'Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage. ok
     */
    public function destroy(Terrain $terrain)
    {
        try {
            $terrain->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
