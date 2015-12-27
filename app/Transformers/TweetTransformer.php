<?php
namespace JoeCianflone\Transformers;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class TweetTransformer
{
   public function transform($tweets)
   {
      return array_map(function($tweet) {
         return [
            'id' => Uuid::uuid1()->toString(),
            'content' => $tweet,
            'item_id' => $tweet->id_str,
            'type' => 'tweet',
            'item_created_at' => Carbon::parse($tweet->created_at)->timezone(env("APP_TIMEZONE"))
         ];
      }, $tweets);
   }
}
