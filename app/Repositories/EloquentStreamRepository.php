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
      return $this->stream->skip($offset)->take($count)->orderBy('social_created_at', 'desc')->get()->toJson();
   }

   public function getStreamType($type, $count = 10, $offset = 0)
   {
      return $this->stream->where("social_type", $type)->skip($offset)->take($count)->orderBy('social_created_at', 'desc')->get()->toJson();
   }

   public function getPinnedStreamItem()
   {
      return $this->stream->where("is_pinned", true)->get()->toJson();
   }

   public function saveLatestToStream($item)
   {
      $count = $this->stream->where('social_type', $item["social_type"])->where('social_id', $item["social_id"])->count();

      if ($count <= 0) {
         $this->stream->create($item);
      }
   }

}
