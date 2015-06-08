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
         $transformer = [
            'id' => Uuid::uuid1()->toString(),
            'data' => json_encode($tweet),
            'social_id' => $tweet->id_str,
            'social_type' => 'twitter',
            'social_created_at' => Carbon::parse($tweet->created_at)->toDateTimeString()
         ];
         $this->stream->saveLatestToStream($transformer);
      }
   }
}
