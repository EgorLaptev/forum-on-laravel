<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
      'likes' => 0
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
