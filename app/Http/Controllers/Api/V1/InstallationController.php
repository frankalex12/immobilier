<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\InstallationStoreRequest;
use App\Http\Resources\Api\V1\InstallationResource as V1InstallationResource;
use App\Models\Installation;

class InstallationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        try {
            return response()->json(V1InstallationResource::collection(Installation::all()),200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstallationStoreRequest $request)
    {
        try {
            return response()->json(new V1InstallationResource(Installation::create($request->validated())),200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Installation $installation)
    {
        try {
            return response()->json(new V1InstallationResource($installation),200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstallationStoreRequest $request, Installation $installation)
    {
        try {
            $installation->update($request->validated());
            return response()->json('Modifier avec Succes !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installation $installation)
    {
        try {
            $installation->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
