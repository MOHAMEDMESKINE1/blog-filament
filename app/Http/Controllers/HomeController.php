<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (Request $request){

        $posts = Post::paginate(3);
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

        $posts = Post::with("tags")->get();
        $categories = Category::all();
        $tags = Tag::all();
        $comments  = Comment::all();
        if($request->search){
            $latest_posts = Post::where("title", "like", "%" . $request->search . "%")->get();

        }else{
            $latest_posts = Post::latest()->get();
        }
        $post = Post::where("slug",$slug)->first();

        $all_posts =Post::all();

        return view('posts',compact("post","all_posts","posts","categories","tags","latest_posts","comments"));
    }
    
    public function postsByTag($tagName,Request $request)
    {
        $tag = Tag::where('name', $tagName)->firstOrFail();
        $posts = $tag->posts;
        $categories = Category::all();
        $tags = Tag::all();

        if($request->search){
            $latest_posts = Post::where("title", "like", "%" . $request->search . "%")->get();

        }else{
            $latest_posts = Post::latest()->get();
        }
      
        return view('posts_tags', compact("posts","latest_posts","categories","tags"));
    }

    public function contact (){

        return view('contact');
    }
}
