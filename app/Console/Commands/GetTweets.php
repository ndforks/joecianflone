<?php namespace JoeCianflone\Console\Commands;

use Twitter;
use Event;
use Illuminate\Console\Command;
use JoeCianflone\Events\GotSomeTweets;

class GetTweets extends Command
{
   /**
   * The name and signature of the console command.
   *
   * @var string
   */
   protected $signature = 'cianflone:tweets';

   /**
   * The console command description.
   *
   * @var string
   */
   protected $description = 'This gets the last 10 tweets';

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
      $rawTweets = Twitter::getUserTimeline([['screen_name' => 'joecianflone', 'count' => 10]]);
      event(new GotSomeTweets($rawTweets));
   }
}
