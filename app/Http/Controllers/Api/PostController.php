<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Post;

class PostController extends Controller
{
    public function getComments(Post $post)
    {
        return $post->comments;
    }
}