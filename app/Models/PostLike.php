<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{

    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }

}
