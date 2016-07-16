<?php

namespace JoeCianflone\Http\Controllers;

use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Http\Controllers\Controller;
use JoeCianflone\Exceptions\NoStreamItemsFoundException;

class RSSFeedController extends Controller
{
   private $stream;

   public function __construct(StreamRepository $stream)
   {
      $this->stream = $stream;
   }

   public function index()
   {
      $fullStream = json_decode($this->stream->getFullStream());
      $siteContent = array_filter($fullStream->data, function($item) {
          return $item->type !== 'tweet';
      });

      return response()->view('feed', compact('siteContent'))->header('Content-Type', 'text/xml');
   }

}
