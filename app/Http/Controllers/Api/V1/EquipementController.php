<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\EquipementStoreRequest;
use App\Http\Resources\Api\V1\EquipementResource;
use App\Models\Equipement;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json(EquipementResource::collection(Equipement::all()), 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipementStoreRequest $request)
    {
        try {
            return response()->json(new EquipementResource(Equipement::create($request->validated())), 201);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipement $equipement)
    {
        try {
            return response()->json(new EquipementResource($equipement), 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipementStoreRequest $request, Equipement $equipement)
    {
        try {
            $equipement->update($request->validated());
            return response('Modifier avec Succes', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipement $equipement)
    {
        try {
            $equipement->delete();
            return response()->json('Spprimer avec Succes', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
