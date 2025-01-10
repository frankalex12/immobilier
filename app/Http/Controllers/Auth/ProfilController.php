<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function Profil()
    {
        return response()->json(['profils'=> Auth::user()],200);
    }

}
