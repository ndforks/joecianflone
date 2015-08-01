<?php
namespace JoeCianflone\Contracts;

interface StreamRepository {

   public function getFullStream();
   public function getStreamType($type);

   public function saveLatestToStream($items);
   public function updateStreamItem($itemId, $updates);
}
