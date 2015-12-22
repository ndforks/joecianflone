<?php

namespace JoeCianflone\Http\Controllers;

use Illuminate\Http\Request;
use View;
use JoeCianflone\Http\Requests;
use JoeCianflone\Http\Controllers\Controller;

class PageController extends Controller
{
   public function __construct() { }

   public function index($slug) {
      $slug = str_replace("/", ".", $slug);

      if (View::exists('pages.'.$slug)) {
         return view('pages.'. $slug);
      }

      return abort(404);
   }
}
