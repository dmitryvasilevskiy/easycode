<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserChannelStoreRequest;
use App\Http\Resources\UserChannelResource;
use App\Models\UserChannel;
use Illuminate\Support\Facades\Auth;

class UserChannelController extends Controller
{
    public function index()
    {
        return UserChannelResource::collection(
            UserChannel::query()->orderByDesc('pos')->where('is_active')->get()
        );
    }

    public function store(UserChannelStoreRequest $request)
    {
        return response()->json([
            'success' => Auth::user()->update(['channel_id' => request('channel_id')]),
            'token' => 'channel update'
        ]);
    }
}
