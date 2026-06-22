<?php

namespace App\Jobs;

use App\Models\Todo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessTodoJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $todo;
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Trước khi queue xử lý
        Log::info("Trước khi xử lý {$this->todo->id}");
        sleep(15);
        Log::info("Đã xử lý xong {$this->todo->id}");
    }
}