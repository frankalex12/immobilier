<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(UserRequest $request)
    {
        if ($request->password == $request->confirmpassword) {

            if (!User::where('email', $request->email)->exists()) {

                $photo = $request->hasFile('photo') ? $request->file('photo')->store('profil/photo') : null;

                return response()->json(['user' => User::create(
                    [
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'name' => $request->name,
                        'lastname' => $request->lastname,
                        'photo' => $photo
                    ]
                )], 201);
            }
            return response()->json(['message' => 'cet email existe deja !'], 200);
        }
        return response()->json(['message' => 'Reverifier votre mot de passe !'], 200);
    }
}
