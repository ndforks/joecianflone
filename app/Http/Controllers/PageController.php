<?php

namespace JoeCianflone\Http\Controllers;

use Illuminate\Http\Request;

use JoeCianflone\Http\Requests;
use JoeCianflone\Http\Controllers\Controller;

class PageController extends Controller
{
   public function __construct() { }

   public function index() {
      echo "page";
   }
}
