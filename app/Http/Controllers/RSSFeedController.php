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
      dd ($fullStream->data);
      return response()->view('feed', compact('fullStream'))->header('Content-Type', 'text/xml');
   }

}
