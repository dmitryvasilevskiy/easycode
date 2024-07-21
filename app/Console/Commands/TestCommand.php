<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\CodeNotification;
use Illuminate\Console\Command;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class TestCommand extends Command
{
    protected $signature = 'app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $code = '';
        for ($i = 0; $i < 4; $i++) {
            $code .= mt_rand(0, 9);
        };

        User::query()->first()->notify(new CodeNotification($code));
    }
}
