<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserChannelResource;
use App\Models\UserChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChannelController extends Controller
{
    public function index()
    {
        return UserChannelResource::collection(
            UserChannel::query()->orderByDesc('pos')->where('is_active')->get()
        );
    }

    public function store(Request $request)
    {
        Auth::user()->update(['channel_id' => request('channel_id')]);
        return response()->json([
            'success' => true,
            'token' => 'channel update'
        ]);
    }
}
