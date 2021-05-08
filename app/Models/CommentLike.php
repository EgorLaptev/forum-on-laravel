<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function comment()
    {
        return $this->hasOne(Comment::class, 'id', 'comment_id');
    }

}
