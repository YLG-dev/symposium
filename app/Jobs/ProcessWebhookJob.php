<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Process;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{
    public function handle()
    {
        Process::path(__DIR__)->run('bash deploy.sh');
    }
}
