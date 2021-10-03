<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        
        return view('front.index', compact('posts'));
    }

    public function article($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        return view('front.posts.show', compact('post'));
    }

}
