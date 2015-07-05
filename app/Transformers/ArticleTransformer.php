<?php
namespace JoeCianflone\Transformers;

use Storage;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Mni\FrontYAML\Parser;
use JoeCianflone\Events\GotSomeArticles;

class ArticleTransformer
{
   public function transform($articles)
   {
      return array_map(function($article) {
         $parser = new Parser();
         $file = Storage::disk("dropbox")->get($article);

         $document = $parser->parse($file);
         $yaml = $document->getYAML();
         $html = $document->getContent();

         return [
            'id'              => Uuid::uuid1()->toString(),
            'type'            => 'article',
            'item_id'         => md5($article),
            'slug'            => $yaml['slug'],
            'is_pinned'       => isset($yaml['pin']) ? $yaml['pin'] : false,
            'item_created_at' => Carbon::parse(isset($yaml['pubdate']) ? $yaml['pubdate'] : Carbon::now()),
            'content' => [
               'headline' => isset($yaml['headline']) ? $yaml['headline'] : null,
               'byline'   => isset($yaml['byline']) ? $yaml['byline'] : null,
               'summary'  => isset($yaml['summary']) ? $yaml['summary'] : null,
               'pubdate'  => Carbon::parse(isset($yaml['pubdate']) ? $yaml['pubdate'] : Carbon::now()),
               'update'   => Carbon::parse(isset($yaml['update']) ? $yaml['update'] : Carbon::now()),
               'body'     => $html,
               'tags'     => isset($yaml['tags']) ? $yaml['tags'] : null
            ],
         ];
      }, $articles);
   }
}
