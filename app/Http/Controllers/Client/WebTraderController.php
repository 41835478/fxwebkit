<?php

namespace Fxweb\Http\Controllers\client;

use Illuminate\Http\Request;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

class WebTraderController extends Controller
{
 public function getWebTrader(){

     return view('client.webTrader');
 }
}
