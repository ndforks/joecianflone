<?php namespace JoeCianflone\Http\Controllers;

use Twitter;
use Illuminate\Http\Request;
use JoeCianflone\Http\Requests;
use JoeCianflone\Stream;
use Ramsey\Uuid\Uuid;
use DB;
use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Http\Controllers\Controller;

class HomeController extends Controller
{
   protected $stream;

    public function index(StreamRepository $stream)
    {
       $this->stream = $stream;
       $streamer = $this->stream->getFullStream(10);

       return view('pages.home')->with('stream', json_decode($streamer));
    }

}
