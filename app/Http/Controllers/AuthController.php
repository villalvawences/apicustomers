<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = sha1($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'msg' => 'Usuario creado correctamente'
        ], 200);
    }

    public function access(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && sha1($request->password) === $user->password) {

            $request->email;
            $timestamp = Carbon::now()->timestamp;
            $randomValue = mt_rand(200, 500);
            $tokenData = $timestamp . $randomValue;
            // La contraseña es correcta
            $token = $user->createToken($tokenData, ['*'])->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
            ], 200);
        } else {
            // La contraseña es incorrecta
            throw ValidationException::withMessages([
                'msg' => ['Las credenciales son incorrectas'],
            ]);
        }
    }

    public function deletedToken(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'msg' => 'Token eliminado correctamente',
        ], 200);
    }
}
