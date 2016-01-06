<?php
namespace JoeCianflone\Listeners;

use JoeCianflone\Events\GotSomeArticles;
use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Transformers\ArticleTransformer;

class SaveArticles
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

      foreach ($articles as $article) {
         if ($this->stream->articleExists($article)) {
            $this->stream->updateItemInStream($article);
         } else {
            $this->stream->saveLatestToStream($article);
         }
      }
   }
}
