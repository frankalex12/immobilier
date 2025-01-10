<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\HoraireSnackRequest;
use App\Http\Resources\Api\V1\HoraireResource;
use App\Models\Horaire;
use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoraireSnackController extends Controller
{
    /**
     * Display a listing of the resource. ok
     */
    public function index()
    {
        try {
            $horaires = Horaire::with('snack')->paginate(10);
            return response()->json([$horaires], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec D\'Operation !'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HoraireSnackRequest $request, Snack $snack)
    {
        try {
            DB::beginTransaction();
            $horaire = Horaire::create([
                'jour'=>$request->jour,
                'ouverture'=>$request->fermeture,
                'fermeture'=>$request->fermeture,
                'snack_id'=>$snack->id
            ]);
            return response()->json([$horaire, 'message' => ' success !'], 201);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource. ok
     */
    public function show(Snack $snack,Horaire $horaire)
    {
        return response()->json([Horaire::with('snack')->findOrFail($horaire->id)], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Snack $snack, Horaire $horaire)
    {
        try {
            // DB::beginTransaction();
            $horaire->update([
                'jour'=>$request->jour,
                'ouverture'=>$request->fermeture,
                'fermeture'=>$request->fermeture,
                'snack_id'=>$snack->id
            ]);
            return response()->json(['message'=>'Ressource modifier avec success !'], 200);
            // DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message'=>'Echec d\'Operation !'], 500);
            // DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage. ok
     */
    public function destroy(Snack $snack, Horaire $horaire)
    {
        try {
            $horaire->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
