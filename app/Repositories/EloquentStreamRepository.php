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
      return json_decode($this->stream->skip($offset)->take($count)->orderBy('item_created_at', 'desc')->get()->toJson());
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
      return json_decode($this->stream->where("type", $type)->skip($offset)->take($count)->orderBy('item_created_at', 'desc')->get()->toJson());
   }

   /**
    * [getPinnedStreamItem description]
    * @return [type] [description]
    */
   public function getPinnedStreamItem()
   {
      return json_decode($this->stream->where("is_pinned", true)->first()->toJson());
   }

   /**
    * [getArticleBySlug description]
    * @param  [type] $slug [description]
    * @return [type]       [description]
    */
   public function getArticleBySlug($slug)
   {
      return json_decode($this->stream->where("slug", $slug)->first()->toJson());
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

   /**
    * [updateStreamItem description]
    * @param  [type] $itemId  [description]
    * @param  [type] $updates [description]
    * @return [type]          [description]
    */
   public function updateStreamItem($itemId, $updates)
   {

   }

}
