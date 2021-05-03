<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function show(Post $post)
    {
        return view('pages.posts.post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        if ($request->isMethod('post')) {

            /* Validation user's data */
            $valid = $request->validate([
                'title' => 'required',
                'anons' => 'required',
                'content' => 'required',
            ]);

            /* Creating a new post */
            Post::create([
                'title' => $valid['title'],
                'anons' => $valid['anons'],
                'content' => $valid['content'],
                'user_id' => Auth::id(),
            ]);

            /* Returning a successful message */
            Session::flash('success', 'New post was added!');

        }

        return view('pages.posts.create');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Post $post
     */
    public function delete(Post $post)
    {

        /* Getting all post's comments */
        $commentsOfPost = Comment::where('post_id', $post['id'])->get();

        /* Removing all post's comments & comments likes */
        foreach ($commentsOfPost as $commentOfPost) {

            $likesOfComment = CommentLike::where('comment_id', $commentOfPost['id'])->get();

            foreach ($likesOfComment as $likeOfComment) {
                $likeOfComment->delete();
            }

            $commentOfPost->delete();

        }

        /* Getting all post's likes */
        $likesOfPost = PostLike::where('post_id', $post['id'])->get();

        /* Removing all post's likes */
        foreach ($likesOfPost as $likeOfPost) {
            $likeOfPost->delete();
        }

        /* Delete the post */
        Post::find($post['id'])->forceDelete();

        return redirect()->intended(route('home'));

    }

    public function like($post_id)
    {

        if (Auth::check()) {

            /* Is the like mark already set? */
            $alreadyLiked = PostLike::where('post_id', $post_id)
                ->where('user_id', Auth::id())
                ->first();

            if (!$alreadyLiked) {

                /* Adding new like */
                PostLike::create([
                    'user_id' => Auth::id(),
                    'post_id' => $post_id,
                ]);

            }
        }

        /* Getting all post's likes */
        $likes = Post::find($post_id)->likes()->get();

        return count($likes);

    }

}
