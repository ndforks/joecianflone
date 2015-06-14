<?php

namespace JoeCianflone\Listeners;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use JoeCianflone\Events\GotSomeTweets;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use JoeCianflone\Contracts\StreamRepository;

class TransformTweets implements ShouldQueue
{
   private $stream;
   /**
   * Create the event listener.
   *
   * @return void
   */
   public function __construct(StreamRepository $stream)
   {
      $this->stream = $stream;
   }

   /**
   * Handle the event.
   *
   * @param  GotSomeTweets  $event
   * @return void
   */
   public function handle(GotSomeTweets $event)
   {
       foreach ($event->tweets as $tweet) {
         $this->stream->saveLatestToStream([
            'id' => Uuid::uuid1()->toString(),
            'content' => $tweet,
            'item_id' => $tweet->id_str,
            'type' => 'twitter',
            'item_created_at' => Carbon::parse($tweet->created_at)->timezone(env("APP_TIMEZONE"))
         ]);
      }
   }
}
