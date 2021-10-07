<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    /**
     * The tags that belong to the post.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
