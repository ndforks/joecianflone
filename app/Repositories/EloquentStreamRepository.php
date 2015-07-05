<?php
namespace JoeCianflone\Repositories;

use JoeCianflone\Stream;
use JoeCianflone\Contracts\StreamRepository;

class EloquentStreamRepository implements StreamRepository {

   private $stream;

   /**
    * [__construct description]
    * @param Stream $stream [description]
    */
   public function __construct(Stream $stream)
   {
      $this->stream = $stream;
   }

   /**
    * [getFullStream description]
    * @param  integer $count  [description]
    * @param  integer $offset [description]
    * @return [type]          [description]
    */
   public function getFullStream($count = 10, $offset = 0)
   {
      return $this->getCollectionOrNull($this->stream->skip($offset)->take($count)->orderBy('item_created_at', 'desc')->get());
   }

   /**
    * [getStreamType description]
    * @param  [type]  $type   [description]
    * @param  integer $count  [description]
    * @param  integer $offset [description]
    * @return [type]          [description]
    */
   public function getStreamType($type, $count = 10, $offset = 0)
   {
      return $this->getCollectionOrNull($this->stream->where("type", $type)->skip($offset)->take($count)->orderBy('item_created_at', 'desc')->get());
   }

   /**
    * [getPinnedStreamItem description]
    * @return [type] [description]
    */
   public function getPinnedStreamItem()
   {
      return $this->getItemOrNull($this->stream->where("is_pinned", true)->first());
   }

   /**
    * [getArticleBySlug description]
    * @param  [type] $slug [description]
    * @return [type]       [description]
    */
   public function getArticleBySlug($slug)
   {
      return $this->getItemOrNull($this->stream->where("slug", $slug)->first());
   }

   /**
    * [saveLatestToStream description]
    * @param  [type] $item [description]
    * @return [type]       [description]
    */
   public function saveLatestToStream($item)
   {
      $count = $this->stream->where('type', $item["type"])->where('item_id', $item["item_id"])->count();

      if ($count <= 0) {
         $this->stream->create($item);
      }
   }

   public function saveCollectionToStream($collection) {
      foreach ($collection as $item) {
         $this->saveLatestToStream($item);
      }
   }

   /**
    * [updateStreamItem description]
    * @param  [type] $itemId  [description]
    * @param  [type] $updates [description]
    * @return [type]          [description]
    */
   public function updateStreamItem($itemId, $updates)
   {

   }

   private function getItemOrNull($query)
   {
      return (is_null($query)) ? null : json_decode($query->toJson());
   }

   private function getCollectionOrNull($query)
   {
      return ($query->count() <= 0) ? null : json_decode($query->toJson());
   }
}
