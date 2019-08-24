<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class PagesController extends Controller
{
    public function home(){
      return view('welcome');
    }
    public function about(){

        $list = [
          'This is first point about us',
          'This is second point about us',
          'This is third point about us'
        ];
        return view('about')->withList($list);

    }
    public function contact(){
      return view('contact');
    }
}
