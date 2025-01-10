<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class LogoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Logout()
    {
        User::findOrfail(Auth::user()->id)->tokens()->delete();

        return response()->json(['messages'=>'vous etes deconnecté !'],200);
    }

}
