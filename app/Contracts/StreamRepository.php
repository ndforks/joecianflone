<?php
namespace JoeCianflone\Contracts;

interface StreamRepository {

   public function getFullStream();
   public function getStreamType(string $type);

   public function saveLatestToStream($items);
   public function updateStreamItem(int $itemId, $updates);
}
