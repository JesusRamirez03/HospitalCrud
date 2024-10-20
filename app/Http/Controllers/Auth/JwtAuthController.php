<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\JwtUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\ValidationException;

class JwtAuthController extends Controller
{
    // Registro de usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:jwt_users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = JwtUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Usuario registrado exitosamente.']);
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = JWTAuth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas son incorrectas.'],
            ]);
        }

        return response()->json(['token' => $token]);
    }

    // Cierre de sesión
    public function logout()
    {
        Auth::guard('jwt')->logout();

        return response()->json(['message' => 'Cierre de sesión exitoso.']);
    }

    // Obtener el usuario autenticado
    public function userProfile()
    {
        return response()->json(auth()->guard('jwt')->user());
    }
}
