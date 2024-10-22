<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Process;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{
    public function handle()
    {
        Process::path(__DIR__)->run('git stash');
        Process::path(__DIR__)->run('git pull origin main');
        Process::path(__DIR__)->run('php artisan optimize:clear');
        Process::path(__DIR__)->run('php artisan migrate --force');
        Process::path(__DIR__)->run('php artisan optimize');
    }
}
