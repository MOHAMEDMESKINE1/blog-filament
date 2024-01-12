<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $id)
    {
    
       

        $post = Post::findOrFail($id);

        $comment = new Comment([
            'content' => $request->input('content'),
            'post_id' =>$post->id,
        ]);

        Auth::user()->comments()->save($comment); // Associate comment with authenticated user
        $post->comments()->save($comment); // Associate comment with the post


        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function reply(CommentRequest $request, $id,$parent_id = null)
    {
    
       

        $post = Post::findOrFail($id);

        $comment = new Comment([
            'content' => $request->input('content'),
            'post_id' =>$post->id,
            'parent_id'=>$parent_id
        ]);

        Auth::user()->comments()->save($comment); // Associate comment with authenticated user
        $post->comments()->save($comment); // Associate comment with the post


        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function show(Post $post)
{
    // Get the comments for the post
    $comments = $post->comments()->with('replies')->get();

    // Return the view with the comments
    return view('posts', compact('post', 'comments'));
}
   
}
