<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Services\BasketService;
use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function __construct(
        protected BasketService $basketService
    ) {}
    public function login(SignInRequest $request)
    {
        $params = $request->validated();

        $user = User::where('username', $params['username'])->first();

        if (! $user || ! \Hash::check($params['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $guestToken = $request->header('X-Guest-Token');

        if ($guestToken) {
            $this->basketService->pinBasketToUser($user, $guestToken);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
