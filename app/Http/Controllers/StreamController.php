<?php
namespace JoeCianflone\Http\Controllers;

use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Http\Controllers\Controller;
use JoeCianflone\Exceptions\NoStreamItemsFoundException;

class StreamController extends Controller
{
   protected $stream;

   public function __construct(StreamRepository $stream)
   {
      $this->stream = $stream;
   }

   public function index()
   {
      $pinned = json_decode($this->stream->getPinnedStreamItem());
      $stream = json_decode($this->stream->getFullStream(10));

      return view('pages.home', compact('stream', 'pinned'));
   }

   public function stream($type = 'all')
   {
      if ($type === 'all') {
         return redirect('/');
      }

      try {
         $stream = json_decode($this->stream->getStreamType($type));
      } catch (NoStreamItemsFoundException $e) {
         return redirect('/');
      }

      return view('pages.stream', compact('stream'));
   }

}
