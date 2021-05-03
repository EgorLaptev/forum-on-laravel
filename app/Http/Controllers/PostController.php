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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request->isMethod('post')) {

            $post = $request->validate([
                'title' => 'required',
                'anons' => 'required',
                'content' => 'required',
            ]);

            $post['user_id'] = Auth::id();

            Post::create($post);

            Session::flash('success', 'New post was added!');

        }

        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('pages.posts.post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $commentsOfPost = Comment::where('post_id', $post['id'])->get();

        foreach ($commentsOfPost as $commentOfPost) {

            $likesOfComment = CommentLike::where('comment_id', $commentOfPost['id'])->get();

            foreach ($likesOfComment as $likeOfComment) {
                $likeOfComment->delete();
            }

            $commentOfPost->delete();

        }

        $likesOfPost = PostLike::where('post_id', $post['id'])->get();

        foreach ($likesOfPost as $likeOfPost) {
            $likeOfPost->delete();
        }

        Post::find($post['id'])->forceDelete();
        return redirect()->intended(route('home'));
    }

    public function like($post_id)
    {

        if (Auth::check()) {
            $alreadyLiked = PostLike::where('post_id', $post_id)
                ->where('user_id', Auth::id())
                ->first();

            if (!$alreadyLiked) {
                PostLike::create([
                    'user_id' => Auth::id(),
                    'post_id' => $post_id,
                ]);
            }
        }

        $likes = Post::find($post_id)->likes()->get();

        return count($likes);

    }

}
