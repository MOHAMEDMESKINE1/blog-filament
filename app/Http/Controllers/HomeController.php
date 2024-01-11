<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (Request $request){

        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();

        if($request->search){
            $latest_posts = Post::where("title", "like", "%" . $request->search . "%")->get();

        }else{
            $latest_posts = Post::latest()->get();
        }
        return view('home',compact("posts","latest_posts","categories","tags"));
    }
    public function about (){

        return view('about');
    }
    public function blog (Request $request){

        $posts = Post::paginate(4);
        $categories = Category::all();
        $tags = Tag::all();

        if($request->search){
            $latest_posts = Post::where("title", "like", "%" . $request->search . "%")->get();

        }else{
            $latest_posts = Post::latest()->get();
        }
        // $post = Post::where("slug",$slug)->first();
        return view('blog',compact("posts","categories","tags","latest_posts"));
    }
    public function posts ($slug,Request $request){

        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();

        if($request->search){
            $latest_posts = Post::where("title", "like", "%" . $request->search . "%")->get();

        }else{
            $latest_posts = Post::latest()->get();
        }
        $post = Post::where("slug",$slug)->first();
        return view('posts',compact("post","posts","categories","tags","latest_posts"));
    }
    public function contact (){

        return view('contact');
    }
}
