<?php
namespace JoeCianflone\Contracts;

interface StreamRepository {

   public function getFullStream($count, $offset = 0);
   public function getStreamType($type, $count = 10, $offset = 0);

   public function saveLatestToStream($items);
   public function updateStreamItem($itemId, $updates);
}
