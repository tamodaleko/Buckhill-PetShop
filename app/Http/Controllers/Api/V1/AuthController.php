<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\Auth\LoginRequest;
use App\Models\JwtToken;
use Illuminate\Support\Carbon;

class AuthController extends ApiV1Controller
{
    /**
     * @param \App\Http\Requests\V1\Auth\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!$jwt = auth()->attempt($credentials)) {
            return response()->json([
                'error' => __('Your credentials are invalid.')
            ], 401);
        }

        $payload = auth()->payload();
        $user = auth()->user();

        $token = JwtToken::create([
            'user_id' => $user->id,
            'unique_id' => $payload['jti'],
            'token_title' => $user->name,
            'expires_at' => Carbon::parse($payload['exp'])
        ]);

        return $this->respondWithToken($jwt);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
