<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function store(Setting $s)
    {
        $user = auth()->user();
        $setting = $user->settings()->where(['setting_id' => $s->id])->first();
        if ($setting) {
            $setting->users()->updateExistingPivot($user, ['is_active' => !$setting->pivot->is_active], false);
        }

        return response()->json([
            'success' => true,
            'token' => 'setting update'
        ]);
    }
}
