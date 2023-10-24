<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ArtistFrontController extends Controller
{
   public function index(){
       return view('FrontClient.home');
   }
}
