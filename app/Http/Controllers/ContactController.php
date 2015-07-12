<?php

namespace JoeCianflone\Http\Controllers;

use Illuminate\Http\Request;

use JoeCianflone\Http\Requests;
use JoeCianflone\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
       return view('pages.contact');
    }
}
