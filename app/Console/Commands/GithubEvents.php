<?php

namespace App\Console\Commands;

use App\Http\Services\GithubEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GithubEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update my github events';

    /**
     * get events and persist
     * @param \App\Http\Services\GithubEvent $event
     */
    public function handle(GithubEvent $event)
    {
        try {
            $event->setUsername('aguimaraes');
            $event->all();
            $this->info('Events successfully imported.');
        } catch (\Exception $e) {
            Log::error(
                'An Error occurred trying to get my the github list of events:',
                [
                    'message' => $e->getMessage(),
                    'class' => get_class($e)
                ]
            );
            $this->error('An error occurred.');
        }
    }
}
