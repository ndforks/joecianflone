<?php namespace JoeCianflone\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
   /**
   * The Artisan commands provided by your application.
   *
   * @var array
   */
   protected $commands = [
      \JoeCianflone\Console\Commands\GetTweets::class,
      \JoeCianflone\Console\Commands\GetArticles::class,
   ];

   /**
   * Define the application's command schedule.
   *
   * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
   * @return void
   */
   protected function schedule(Schedule $schedule)
   {
      $schedule->command('stream:tweets')->everyMinute()->withoutOverlapping();
      $schedule->command('stream:articles')->dailyAt('9:30')->withoutOverlapping();
   }
}
