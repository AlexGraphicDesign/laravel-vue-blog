<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /**
     * Get the post for the comments.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the comment.
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

     /**
     * Get the comment to respond.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
