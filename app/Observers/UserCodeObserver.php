<?php

namespace App\Observers;

use App\Models\UserCode;

class UserCodeObserver
{
    public function creating(UserCode $code)
    {
        $code->value = '';
        for ($i = 0; $i < 4; $i++) {
            $code->value .= mt_rand(0, 9);
        };
    }
}
