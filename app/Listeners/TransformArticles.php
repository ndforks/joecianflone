<?php

namespace JoeCianflone\Listeners;

use Storage;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use League\CommonMark;
use Mni\FrontYAML\Parser;
use JoeCianflone\Events\GotSomeArticles;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use JoeCianflone\Contracts\StreamRepository;

class TransformArticles
{

   private $parser;
   private $stream;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Parser $parser, StreamRepository $stream)
    {
        $this->parser = $parser;
        $this->stream = $stream;
    }

    /**
     * Handle the event.
     *
     * @param  GotSomeArticles  $event
     * @return void
     */
    public function handle(GotSomeArticles $event)
    {
      foreach ($event->articles as $article) {
         $document = $this->parser->parse(Storage::get($article));
         $yaml = $document->getYAML();

         $this->stream->saveLatestToStream([
            'id'      => Uuid::uuid1()->toString(),
            'type'    => 'article',
            'item_id' => md5($article),
            'content' => json_encode([
               'headline' => isset($yaml['headline']) ? $yaml['headline'] : null,
               'byline'   => isset($yaml['byline']) ? $yaml['byline'] : null,
               'summary'  => isset($yaml['summary']) ? $yaml['summary'] : null,
               'pubdate'  => Carbon::parse(isset($yaml['pubdate']) ? $yaml['pubdate'] : Carbon::now())->toDateTimeString(),
               'body'     => $document->getContent(),
               'tags'     => isset($yaml['tags']) ? $yaml['tags'] : null
             ]),
            'is_pinned'       => isset($yaml['pin']) ? $yaml['pin'] : false,
            'item_created_at' => Carbon::parse($yaml['pubdate'])->toDateTimeString()
         ]);
      }
    }
}
