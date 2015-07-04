<?php
namespace JoeCianflone\Listeners;

use JoeCianflone\Events\GotSomeTweets;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Transformers\TweetTransformer;

class SaveNewTweets implements ShouldQueue
{
   private $stream;
   private $transformer;

   /**
   * Create the event listener.
   *
   * @return void
   */
   public function __construct(StreamRepository $stream, TweetTransformer $transformer)
   {
      $this->stream = $stream;
      $this->transformer = $transformer;
   }

   /**
   * Handle the event.
   *
   * @param  GotSomeTweets  $event
   * @return void
   */
   public function handle(GotSomeTweets $event)
   {
      $tweets = $this->transformer->transform($event->tweets);

      $this->stream->saveCollectionToStream($tweets);
   }
}
