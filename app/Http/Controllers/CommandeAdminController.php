<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Commande_panier;

class CommandeAdminController extends Controller
{
    public function __invoke()
    {
        return response()->json(Commande::paginate(10), 200);
    }

}
