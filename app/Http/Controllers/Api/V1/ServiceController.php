<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ServiceStoreRequest;
use App\Http\Resources\Api\V1\ServiceResource;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json(ServiceResource::collection(Service::paginate(10)), 200);
        } catch (\Throwable $th) {
            return response()->json(['Echec d\'opereation'],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceStoreRequest $request)
    {
        try {
            return response()->json([
                'data' => new ServiceResource(Service::create($request->validated())),
                'message' => 'Enregistrement reuissie !'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json(['Echec d\'opereation'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        try {
            return response()->json(new ServiceResource($service), 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceStoreRequest $request, Service $service)
    {
        try {
            $service->update($request->validated());
            return response()->json('Midifier avec Succes !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
