<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function delete($comment_id)
    {

        $likesOfComment = CommentLike::where('comment_id', $comment_id)->get();

        foreach ($likesOfComment as $likeOfComment) {
            $likeOfComment->delete();
        }

        Comment::find($comment_id)->delete();
    }

    public function like($comment_id)
    {

        if (Auth::check()) {
            $alreadyLiked = CommentLike::where('comment_id', $comment_id)
                ->where('user_id', Auth::id())
                ->first();

            if (!$alreadyLiked) {
                CommentLike::create([
                    'user_id' => Auth::id(),
                    'comment_id' => $comment_id,
                ]);
            }
        }

        $likes = Comment::find($comment_id)->likes()->get();

        return count($likes);

    }

    public function create(Request $request, $post_id)
    {

        $valid = $request->validate([
            'content' => 'required|min:1|max:1000',
        ]);

        Comment::create([
            'content' => $valid['content'],
            'user_id' => Auth::id(),
            'post_id' => $post_id,
        ]);

        $comment = Comment::get()->last();

        $likes = count($comment->likes()->get());

        return

            <<<COMMENTHTML
    <h4 class="mb-2"> {$comment->user['login']} </h4>
    <p> {$comment['content']} </p>
    <button class="likeComment btn float-left text-light p-0 m-0" data-route="">{$likes}<i class="fas fa-heart ml-1"></i></button>
    <button class="deleteComment btn text-light p-0 ml-3"><i class="fas fa-trash"></i></button>
    <time class="text-secondary float-right" datetime="{$comment['created_at']}">{$comment['created_at']}
COMMENTHTML;

    }
}
