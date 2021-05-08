<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class, 'comment_id', 'id');
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'id','post_id');
    }

}

