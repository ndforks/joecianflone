<?php namespace JoeCianflone\Http\Controllers;

use Twitter;
use Illuminate\Http\Request;
use JoeCianflone\Http\Requests;
use JoeCianflone\Stream;
use Ramsey\Uuid\Uuid;
use Redirect;
use DB;
use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Http\Controllers\Controller;

class HomeController extends Controller
{
   protected $stream;

   public function __construct(StreamRepository $stream)
   {
      $this->stream = $stream;
   }

    public function index()
    {
       $pinned = $this->stream->getPinnedStreamItem();
       $stream = $this->stream->getFullStream(10);

       return view('pages.home', compact('stream', 'pinned'));
    }

    public function article($slug)
    {
       $element = $this->stream->getArticleBySlug($slug);

       return view('pages.article', compact('element'));
    }

    public function stream($type = 'all')
    {
       if ($type === 'all') {
          return redirect('/');
       }

       $stream = $this->stream->getStreamType($type);

       return view('pages.stream', compact('stream'));
    }

}
