<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\SanckRequest;
use App\Http\Resources\Api\V1\SnackResource;
use App\Models\Bien;
use App\Models\Proprietaire;
use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanckController extends Controller
{
    /**
     * Display a listing of the resource. ok
     */
    public function index()
    {
        try {
            DB::beginTransaction();
            $snacks = Snack::with('bien', 'bien.proprietaire','horaires','produitSnacks','evenementSnack','bien.images')->paginate(10);
            return response()->json($snacks, 200);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec D\'Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Store a newly created resource in storage. ok
     */
    public function store(SanckRequest $request)
    {
        try {
            DB::beginTransaction();
            $proprietaire = Proprietaire::create($request->validated());
            $file = $request->hasFile('ImageAvant') ? $request->file('ImageAvant')->store('images/snack/avant') : null;
            $bien = Bien::create([
                'titre' => $request->titre,
                'quatier' => $request->quatier,
                'adress' => $request->adress,
                'accessService' => $request->accessService,
                'ImageAvant' => $file,
                'proprietaire_id' => $proprietaire->id
            ]);
            $logo = $request->hasFile('logo') ? $request->file('logo')->store('images/snack/logo') : null;
            $snack = Snack::create([
                'ambience' => $request->ambience,
                'style' => $request->style,
                'particularite' => $request->particularite,
                'Annulation_politique' => $request->Annulation_politique,
                'Modification_politique' => $request->Modification_politique,
                'proposition_annulation_politique' => $request->proposition_annulation_politique,
                'parking_infos' => $request->parking_infos,
                'bien_id' => $bien->id,
                'logo' => $logo
            ]);
            return response()->json([$snack, 'message' => ' success !'], 201);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Snack $snack)
    {
        $snacks= Snack::with('bien', 'bien.proprietaire','horaires','produitSnacks','evenementSnack','bien.images')->findOrFail($snack->id);

        return response()->json($snacks, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SanckRequest $request, Snack $snack)
    {
        try {
            DB::beginTransaction();
            $snack->update($request->validated());
            $bien = Bien::find($snack->bien_id);
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
    public function destroy(Snack $snack)
    {
        try {
            $snack->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
