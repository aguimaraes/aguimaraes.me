<?php

namespace App\Console\Commands;

use App\Tweet;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Thujohn\Twitter\Facades\Twitter;

class TwitterTimeline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:timeline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get my last tweets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            $tweets = new Collection(Twitter::getUserTimeline(['screen_name' => 'aguimaraes1986', 'count' => 20, 'format' => 'array']));
            DB::table('tweets')->delete();
            $tweets->each(function ($tweet) {
                $tweet['created_at'] = Carbon::parse($tweet['created_at'])->format('Y-m-d H:i:s');
                $tweetModel = new Tweet($tweet);
                $tweetModel->save();
            });
            $this->info('Tweets successfully imported.');
        } catch (\Exception $e) {
            Log::error(
                'An Error occurred trying to get my tweets:',
                [
                    'message' => $e->getMessage(),
                    'class' => get_class($e)
                ]
            );
            $this->error('An error occurred.');
        }
    }
}
