<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\EvenementSnackRequest;
use App\Models\EvenementSnack;
use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvenementSnackController extends Controller
{
    /**
     * Display a listing of the resource. ok
     */
    public function index(Snack $snack)
    {
        try {
            // DB::beginTransaction();
            $evenementSnack = EvenementSnack::with('snack')->paginate(10);
            return response()->json($evenementSnack, 200);
            // DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec D\'Operation !'], 500);
            // DB::rollBack();
        }
    }

    /**
     * Store a newly created resource in storage. ok
     */
    public function store(EvenementSnackRequest $request, Snack $snack)
    {
        try {
            DB::beginTransaction();
            $file = $request->hasFile('Affiche') ? $request->file('Affiche')->store('images/snack/evenements/Affiche') : null;
            $evenementSnack = EvenementSnack::create([
                'evenement'=>$request->evenement,
                'Description'=>$request->Description,
                'Affiche'=>$file,
                'prix'=>$request->prix,
                'isPublier'=>$request->isPublier,
                'snack_id'=>$snack->id
            ]);
            return response()->json([$evenementSnack, 'message' => ' success !'], 201);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource. ok
     */
    public function show(Snack $snack, $evenementSnack)
    {
        return response()->json(EvenementSnack::with('snack')->findOrFail($evenementSnack), 200);

    }

    /**
     * Update the specified resource in storage. ok
     */
    public function update(Request $request,Snack $snack, EvenementSnack $evenementSnack)
    {
        try {
            DB::beginTransaction();
            $file = $request->hasFile('Affiche') ? $request->file('Affiche')->store('images/snack/evenements/Affiche') : $evenementSnack->Affiche;
            $evenementSnack->update([
               'evenement'=>$request->evenement,
                'Description'=>$request->Description,
                'Affiche'=>$file,
                'prix'=>$request->prix,
                'isPublier'=>$request->isPublier,
                'snack_id'=>$snack->id
            ]);
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
    public function destroy(Snack $snack,EvenementSnack $evenementSnack)
    {
        try {
            $evenementSnack->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
