<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Notifications\CodeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticationController extends Controller
{

    public function store()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = User::query()->find(Auth::user()->id);
            $user_token['token'] = $user->createToken('appToken')->accessToken;

            return response()->json([
                'success' => true,
                'token' => $user_token,
                'user' => $user,
            ]);
        } else {
            // failure to authenticate
            return response()->json([
                'success' => false,
                'message' => 'Failed to authenticate.',
            ], 401);
        }
    }

    public function destroy(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }

    public function sendCode()
    {
        $u = Auth::user();
        $u->code()->delete();
        $u->code()->create();
        $u->notify(new CodeNotification());
    }
}
