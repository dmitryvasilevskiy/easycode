<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserChannelStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'channel_id' => 'required|exists:user_channels,id',
        ];
    }
}
