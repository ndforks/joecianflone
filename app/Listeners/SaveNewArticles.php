<?php
namespace JoeCianflone\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use JoeCianflone\Events\GotSomeArticles;
use Illuminate\Contracts\Queue\ShouldQueue;
use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Transformers\ArticleTransformer;

class SaveNewArticles
{
   private $stream;
   private $transformer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(StreamRepository $stream, ArticleTransformer $transformer)
    {
        $this->stream = $stream;
        $this->transformer = $transformer;
    }

   /**
   * Handle the event.
   *
   * @param  GotSomeArticles  $event
   * @return void
   */
   public function handle(GotSomeArticles $event)
   {
      $articles = $this->transformer->transform($event->articles);
      $this->stream->saveCollectionToStream($articles);
   }
}
