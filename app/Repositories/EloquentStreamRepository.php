<?php
namespace JoeCianflone\Repositories;

use JoeCianflone\Stream;
use JoeCianflone\Contracts\StreamRepository;

class EloquentStreamRepository implements StreamRepository {

   private $stream;

   public function __construct(Stream $stream)
   {
      $this->stream = $stream;
   }

   public function getFullStream($count = 10, $offset = 0)
   {
      return json_decode($this->stream->skip($offset)->take($count)->orderBy('item_created_at', 'desc')->get()->toJson());
   }

   public function getStreamType($type, $count = 10, $offset = 0)
   {
      return json_decode($this->stream->where("type", $type)->skip($offset)->take($count)->orderBy('item_created_at', 'desc')->get()->toJson());
   }

   public function getPinnedStreamItem()
   {
      return json_decode($this->stream->where("is_pinned", true)->first()->toJson());
   }

   public function getArticleBySlug($slug)
   {
      return json_decode($this->stream->where("slug", $slug)->first()->toJson());
   }

   public function saveLatestToStream($item)
   {
      $count = $this->stream->where('type', $item["type"])->where('item_id', $item["item_id"])->count();

      if ($count <= 0) {
         $this->stream->create($item);
      }
   }

   public function updateStreamItem($itemId, $updates)
   {

   }

}
