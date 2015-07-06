<?php

namespace JoeCianflone\Http\Controllers;

use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Http\Controllers\Controller;

class ArticleController extends Controller
{
   private $stream;

   public function __construct(StreamRepository $stream)
   {
      $this->stream = $stream;
   }

   public function article($slug)
   {
      $element = json_decode($this->stream->getArticleBySlug($slug));

      return view('pages.article', compact('element'));
   }
}
