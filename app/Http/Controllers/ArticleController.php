<?php

namespace JoeCianflone\Http\Controllers;

use JoeCianflone\Contracts\StreamRepository;
use JoeCianflone\Http\Controllers\Controller;
use JoeCianflone\Exceptions\NoArticleFoundException;


class ArticleController extends Controller
{
   private $stream;

   public function __construct(StreamRepository $stream)
   {
      $this->stream = $stream;
   }

   public function article(string $slug = null)
   {
      try {
         $element = json_decode($this->stream->getArticleBySlug($slug));
      } catch(NoArticleFoundException $e) {
         return abort(404);
      }

      return view('pages.article', compact('element'));
   }
}
