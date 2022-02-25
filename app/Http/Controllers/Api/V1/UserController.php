<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\User\UserLoginRequest;
use App\Models\JwtToken;
use Illuminate\Support\Carbon;

class UserController extends ApiV1Controller
{
    /**
     * @param \App\Http\Requests\V1\User\UserLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(UserLoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!$jwt = auth()->attempt($credentials)) {
            return response()->json([
                'error' => __('Your credentials are invalid.')
            ], 401);
        }

        if (!$this->createToken()) {
            return response()->json([
                'error' => __('We couldn\'t generate the token. Please try again.')
            ], 500);
        }

        return $this->respondWithToken($jwt);
    }

    /**
     * @return \App\Models\JwtToken|null
     */
    private function createToken()
    {
        $payload = auth()->payload();
        $user = auth()->user();

        return JwtToken::create([
            'user_id' => $user->id,
            'unique_id' => $payload['jti'],
            'token_title' => $user->name,
            'expires_at' => Carbon::parse($payload['exp'])
        ]);
    }

    /**
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    private function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
