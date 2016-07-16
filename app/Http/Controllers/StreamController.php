<?php declare(strict_types=1);

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
      $pinned = $this->stream->getPinnedStreamItem();

      if (! is_null($pinned)) {
         $pinned = json_decode($pinned);
      }

      $stream = json_decode($this->stream->getFullStream(10));

      return view('pages.home', compact('pinned', 'stream'));
   }

   public function stream()
   {
      return redirect()->route('home');
   }

   public function articles()
   {
      return $this->getStreamContent('article');
   }

   public function tweets()
   {
       //dd($this->getStreamContent('tweet'));
      return $this->getStreamContent('tweet');
   }

   private function getStreamContent(string $type)
   {
      try {
         $stream = json_decode($this->stream->getStreamType($type));
         return view('pages.stream', compact('stream'));
      } catch(NoStreamItemsFoundException $e) {
         return redirect()->route('home');
      }
   }
}
