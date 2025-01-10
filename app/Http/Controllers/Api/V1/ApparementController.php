<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\AppartementStoreRequest;
use App\Http\Resources\Api\V1\AppartementCollection;
use App\Http\Resources\Api\V1\AppartementResource;
use App\Models\Appartement;
use App\Models\Bien;
use App\Models\Proprietaire;
use Illuminate\Support\Facades\DB;

class ApparementController extends Controller
{
    /**
     * Display a listing of the resource. ok
     */
    public function index()
    {
        try {
            $appartement = Appartement::paginate(10);
            return response()->json([new AppartementCollection($appartement)], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation !'], 500);
        }
    }

    /**
     * Store a newly created resource in storage. ok
     */
    public function store(AppartementStoreRequest $request)
    {
        try {
            $Proprietaire = Proprietaire::create($request->validated());
            $bien = Bien::create([
                'titre' => $request->titre,
                'quatier' => $request->quatier,
                'adress' => $request->adress,
                'accessService' => $request->accessService,
                'ImageAvant' => $request->hasFile('ImageAvant') ? $request->file('ImageAvant')->store('images/Appartements/avant') : null,
                'proprietaire_id' => $Proprietaire->id
            ]);
            $appartement = Appartement::create(array_merge($request->validated(), ['bien_id' => $bien->id]));
            return response()->json([
                'data' => new AppartementResource($appartement),
                'message' => 'resource enregistrer avec success !'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation !'], 500);
        }
    }

    /**
     * Display the specified resource. ok
     */
    public function show(Appartement $appartement)
    {
        try {
            return response()->json(new AppartementResource($appartement), 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec D\'Operation !'], 500);
        }
    }

    /**
     * Update the specified resource in storage. ok
     */
    public function update(AppartementStoreRequest $request, Appartement $appartement)
    {
        try {
            $appartement->update($request->validated());
            $bien = Bien::find($appartement->bien_id);
            $bien->update([
                'titre' => $request->titre,
                'quatier' => $request->quatier,
                'adress' => $request->adress,
                'accessService' => $request->accessService,
                // 'ImageAvant' => $file = $request->hasFile('ImageAvant') ? $request->file('ImageAvant')->store('images/Terrains/avant') : null
            ]);
            Proprietaire::find($bien->proprietaire_id)->update($request->validated());
            return response()->json(['message' => 'resource Modifier avec success !' ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation !'], 500);
        }
    }

    /**
     * Remove the specified resource from storage. ok
     */
    public function destroy(Appartement $appartement)
    {
        try {
            $appartement->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\'Operation !'], 500);
        }
    }
}
