<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){

        return view('home');
    }
    public function about (){

        return view('about');
    }
    public function blog (){

        return view('blog');
    }
    public function posts (){

        return view('posts');
    }
    public function contact (){

        return view('contact');
    }
}
