<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ProduitSnackRequest;
use App\Models\ProduitSnack;
use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitSnackController extends Controller
{
    /**
     * Display a listing of the resource. ok
     */
    public function index()
    {
        try {
            DB::beginTransaction();
            $produitSnacks = ProduitSnack::with('snack')->paginate(10);
            return response()->json($produitSnacks, 200);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec D\'Operation !'], 500);
            DB::rollBack();
        }
    }

    /**
     * Store a newly created resource in storage. OK
     */
    public function store(ProduitSnackRequest $request,Snack $snack)
    {
        try {
            DB::beginTransaction();
            $file = $request->hasFile('photo') ? $request->file('photo')->store('images/snack/produits') : null;
            $produitSnack = ProduitSnack::create([
                'produit'=>$request->produit,
                'photo'=>$file,
                'prix'=>$request->prix,
                'description'=>$request->description,
                'isPublier'=>$request->isPublier,
                'snack_id'=>$snack->id
            ]);
            return response()->json([$produitSnack, 'message' => ' success !'], 201);
            DB::commit();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Echec d\' Operation !'], 500);
            DB::rollBack();
        }

            // return response()->json($request->validated(), 200);

    }

    /**
     * Display the specified resource. ok
     */
    public function show(Snack $snack, $produitSnack)
    {
        return response()->json(ProduitSnack::with('snack')->findOrFail($produitSnack), 200);

    }

    /**
     * Update the specified resource in storage. ok
     */
    public function update(ProduitSnackRequest $request,Snack $snack, ProduitSnack $produitSnack)
    {
        try {
            DB::beginTransaction();
            $file = $request->hasFile('photo') ? $request->file('photo')->store('images/snack/produits') : $produitSnack->photo;
            $produitSnack->update([
                    'produit'=>$request->produit,
                    'photo'=>$file,
                    'prix'=>$request->prix,
                    'description'=>$request->description,
                    'isPublier'=>$request->isPublier,
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
    public function destroy(Snack $snack,ProduitSnack $produitSnack)
    {
        try {
            $produitSnack->delete();
            return response()->json('Suppression reuissie !', 200);
        } catch (\Throwable $th) {
            return response()->json('Echec d\'Operation !', 500);
        }
    }
}
