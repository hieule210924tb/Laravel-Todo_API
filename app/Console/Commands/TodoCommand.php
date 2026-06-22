<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use function Illuminate\Support\now;

#[Signature('app:todo-command')]
#[Description('Command description')]
class TodoCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("Test command lúc " . now());
    }
}