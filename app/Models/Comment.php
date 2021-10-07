<?php

namespace App\Models;

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
     * Get the user for the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
