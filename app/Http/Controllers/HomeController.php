<?php namespace JoeCianflone\Http\Controllers;

use Twitter;
use Illuminate\Http\Request;
use JoeCianflone\Http\Requests;
use JoeCianflone\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
       //$tweet = Twitter::getUserTimeline(['screen_name' => 'joecianflone', 'count' => 1]);
       //dd ($tweet[0]->text);
       return view('pages.welcome', compact('tweet'));
    }

}
