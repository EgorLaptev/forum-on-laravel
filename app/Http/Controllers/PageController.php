<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'posts' => Post::simplePaginate(9),
        ]);
    }

    public function cabinet($user_id = null)
    {

        if($user_id && Auth::user()['role_id'] <= 2 && User::find($user_id)['role_id'] == 3) abort(403);

        if($user_id && (Auth::id() == $user_id || Auth::user()['role_id'] >= 2)) {
            $user = User::find($user_id);
        } else {
            $user = Auth::user();
        }

        return view('pages.cabinet', [
            'user' => $user
        ]);
    }

    public function userPosts($user_id = null)
    {

        if(!$user_id) $user_id = Auth::id();

        if(Auth::user()['role_id'] >= 2 || Auth::id() == $user_id) {

            return view('pages.user.posts', [
                'user' => User::find($user_id),
                'posts' => Post::where('user_id', $user_id)->simplePaginate(9)
            ]);

        } else abort(403);

    }

    public function userComments($user_id = null)
    {

        if(!$user_id) $user_id = Auth::id();

        if(Auth::user()['role_id'] >= 2 || Auth::id() == $user_id) {

            return view('pages.user.comments', [
                'user' => User::find($user_id),
                'comments' => Comment::where('user_id', $user_id)->simplePaginate(9)
            ]);

        } else abort(403);

    }

    public function likedPosts($user_id = null)
    {

        if(!$user_id) $user_id = Auth::id();

        if(Auth::user()['role_id'] >= 2 || Auth::id() == $user_id) {

            $user = User::find($user_id);

            return view('pages.user.likedPosts', [
                'user' => $user,
                'posts' => $user->liked_posts()->simplePaginate(9)
            ]);

        } else abort(403);

    }

    public function likedComments($user_id = null)
    {

        if(!$user_id) $user_id = Auth::id();

        if(Auth::user()['role_id'] >= 2 || Auth::id() == $user_id) {

            $user = User::find($user_id);

            return view('pages.user.likedComments', [
                'user' => User::find($user_id),
                'comments' => $user->liked_comments()->simplePaginate(9)
            ]);

        } else abort(403);

    }

}
