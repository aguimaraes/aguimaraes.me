<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\GithubEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use GrahamCampbell\GitHub\GitHubManager;
use Github\HttpClient\Message\ResponseMediator;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GitHubManager $github)
    {
        $this->github = $github;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $events = $this->github->getHttpClient()->get('/users/aguimaraes/events');
            $response = new Collection(ResponseMediator::getContent($events));
            $response->each(function ($event) {
                $event['actor'] = $event['actor']['login'];
                $event['repo_url'] = $event['repo']['url'];
                $event['repo'] = $event['repo']['name'];
                $event['created_at'] = Carbon::parse($event['created_at'])->format('Y-m-d H:i:s');
                $eventModel = GithubEvent::firstOrNew(['id' => $event['id']]);
                if (!$eventModel->exists) {
                    $eventModel->fill($event);
                    $eventModel->save();
                }
            });
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
