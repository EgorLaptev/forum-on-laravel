<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request, $post_id)
    {

        $valid = $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'content' => $valid['content'],
            'user_id' => Auth::id(),
            'post_id' => $post_id,
        ]);

        return back();
    }
}
