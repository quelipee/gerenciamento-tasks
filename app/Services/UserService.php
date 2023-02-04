<?php

namespace App\Services;


use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(UserRequest $request):JsonResponse
    {
        $user = User::create($request->validated());
        return response()->json($user,201);
    }

    public function autenticate(UserRequest $request)
    {
        $credentials = $request->only(['email','password']);
        try {
            if (!Auth::attempt($credentials))
            {
                throw new \Exception("Error");
            }
            session()->start();
            session()->put('id',Auth::id());
            return response()->json([],201);
        }catch (Exception $e)
        {
            return response()->json(['error' => 'Email ou senha incorretos'], 401);
        }
    }

    public function destroySession():JsonResponse
    {
        Auth::logout();
        var_dump(Auth::check());
        return response()->json([],201);
    }
}
