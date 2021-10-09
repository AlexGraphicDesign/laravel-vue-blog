<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    /**
     * Get the user for the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The post that belong to the tags.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('comment_id', null);
    }
}
