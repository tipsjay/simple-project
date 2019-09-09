<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    //function home
    public function home()
    {
        return view('welcome',['foo' => 'Me'
      ]);
    }


    //function about
    public function about()
    {
        return view('contact');
    }

    //function contact
    public function contact()
    {
      return view('about');
    }
}
