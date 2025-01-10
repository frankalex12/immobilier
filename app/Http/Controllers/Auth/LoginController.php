<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {

            return response()->json(['token' => $request->user()->createToken('immobilier')->plainTextToken], 200);
        }
        return response()->json(['message' => 'Information erroner !'], 200);
    }
}
