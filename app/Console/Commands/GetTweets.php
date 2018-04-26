<?php

namespace JoeCianflone\Console\Commands;

use Event;
use Twitter;
use Illuminate\Console\Command;
use JoeCianflone\Events\GotSomeTweets;

class GetTweets extends Command
{
   /**
   * The name and signature of the console command.
   *
   * @var string
   */
   protected $signature = 'stream:tweets {count=10}';

   /**
   * The console command description.
   *
   * @var string
   */
   protected $description = 'This gets the last X number of tweets';

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
      $rawTweets = Twitter::getUserTimeline([
        'count' => $this->argument("count"),
        'tweet_mode' => 'extended'
     ]);

      event(new GotSomeTweets($rawTweets));
   }
}
