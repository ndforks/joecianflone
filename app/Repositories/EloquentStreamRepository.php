<?php
namespace JoeCianflone\Repositories;

use JoeCianflone\Stream;
use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Exceptions\NoArticleFoundException;
use JoeCianflone\Exceptions\NoStreamItemsFoundException;

class EloquentStreamRepository implements StreamRepository {

   private $stream;

   public function __construct(Stream $stream)
   {
      $this->stream = $stream;
   }

   public function getFullStream()
   {
      return $this->stream
                  ->orderBy('item_created_at', 'desc')
                  ->paginate(20)->toJson();
   }

   public function getStreamType($type)
   {
      $stream = $this->stream
                     ->where("type", $type)
                     ->orderBy('item_created_at', 'desc')
                     ->paginate(20);

      if ($stream->count() <= 0) {
         throw new NoStreamItemsFoundException();
      }

      return $stream->toJson();
   }

   public function getPinnedStreamItem()
   {
      return $this->stream
                  ->where("is_pinned", true)
                  ->first()->toJson();
   }

   public function getArticleBySlug($slug)
   {
      $article = $this->stream
                      ->where("slug", $slug)
                      ->first();

      if (is_null($article)) {
         throw new NoArticleFoundException();
      }

      return $article->toJson();

   }

   public function saveLatestToStream($item)
   {
      $count = $this->stream
                    ->where('type', $item["type"])
                    ->where('item_id', $item["item_id"])
                    ->count();

      if ($count <= 0) {
         $this->stream->create($item);
      }
   }

   public function saveCollectionToStream($collection)
   {
      foreach ($collection as $item) {
         $this->saveLatestToStream($item);
      }
   }

   public function updateStreamItem($itemId, $updates)
   {
      $this->stream
           ->where("item_id", $itemId)
           ->update($updates);
   }
}
