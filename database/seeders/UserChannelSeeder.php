<?php

namespace Database\Seeders;

use App\Models\UserChannel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserChannel::query()->firstOrCreate(['id' => 1], ['name' => 'Telegram', 'slug' => 'telegram']);
        UserChannel::query()->firstOrCreate(['id' => 2], ['name' => 'Sms', 'slug' => 'sms']);
        UserChannel::query()->firstOrCreate(['id' => 3], ['name' => 'Email', 'slug' => 'mail']);
    }
}
