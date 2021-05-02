<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request, $post_id = '')
    {

        $valid = $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'content' => $valid['content'],
            'user_id' => Auth::id(),
            'post_id' => $post_id,
        ]);

        $comment = Comment::get()->last();

        return

<<<COMMENTHTML
    <h4 class="mb-2"> {$comment->user['login']} </h4>
    <p> {$comment['content']} </p>
    <span class="float-left">{$comment['likes']}<i class="fas fa-heart ml-1"></i></span>
    <time class="text-secondary float-right" datetime="">{$comment['created_at']}
COMMENTHTML;

    }
}
