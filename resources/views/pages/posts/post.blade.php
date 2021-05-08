@extends('layouts.layout')

@section('title') {{ $post['title'] }} @endsection

@section('links')
    <link rel="stylesheet" href="{{ url('public/css/post.css') }}">
@endsection

@section('content')

    {{-- Post --}}
    <article class="container bg-dark text-light text-left rounded p-5">

        {{-- Main content --}}
        <h1 class="mb-4">{{ $post['title'] }}</h1>
        <p class="mb-5">{{ $post['content'] }}</p>

        {{-- Manage buttons --}}
        <button id="likePost" data-route="{{ route('posts.like', ['post_id' => $post['id']]) }}" class="btn text-light pt-1"><span id="postLikesCount">{{ count($post->likes()->get()) }}</span><i class="fas fa-heart ml-2"></i></button>
        <span>{{ count($post->comments()->get()) }}<i class="ml-2 fas fa-comment"></i></span>
        @can('delete', $post)
            <a href="{{ route('posts.delete', [$post] ) }}" id="deletePost" class="btn text-light p-0 pb-1 ml-3"><i class="fas fa-trash"></i></a>
        @endcan

        {{-- Other information --}}
        <time class="text-secondary float-right ml-3" datetime="{{ $post['created_at'] }}">{{ date_format($post['created_at'], 'Y-m-d') }}</time>
        <span class="text-secondary float-right">
            @if($post->user) {{ $post->user['login'] }}
            @else [ Deleted ]
            @endif
        </span>

    </article>

    {{-- Comments section --}}
    <section class="container comments mt-5 pb-5">

        <h2 class="h1 mb-4 text-center text-dark">Comments</h2>

        <ul id="commentsList">

            @auth()
                <li class="container text-light p-0 rounded mb-3">

                    {{-- Comment's form --}}
                    <form action="{{ route('comment.create', ['post_id' => $post['id']]) }}" id="commentForm" method="POST">

                        @csrf

                        <textarea name="content" placeholder="Comment" rows="5" class="form-control w-100 h-50"></textarea>
                        <input type="submit" class="form-control btn btn-success" id="sendComment" value="Send">

                    </form>

                </li>
            @endauth

            {{-- Comment --}}
            @if(count($post->comments))
                @foreach($post->comments as $comment)
                    <li class="container comment bg-dark text-light text-left p-4 rounded mb-3">

                        {{-- Main content --}}
                        <h4 class="mb-2"> {{ $comment->user['login'] }} </h4>
                        <p>{{ $comment['content'] }}</p>

                        {{-- Manage buttons --}}
                        <button class="likeComment btn text-light p-0 m-0" data-route="{{ route('comment.like', ['comment_id' => $comment['id']]) }}"><span class="likesCount">{{ count($comment->likes()->get()) }}</span> <i class="fas fa-heart ml-1"></i></button>
                        @can('delete', $comment)
                            <button class="deleteComment btn text-light p-0 ml-3" data-route="{{ route('comment.delete', [$comment]) }}"><i class="fas fa-trash"></i></button>
                        @endcan

                        {{-- Other information --}}
                        <time class="text-secondary float-right" datetime="{{ $comment['created_at'] }}">{{ $comment['created_at'] }}</time>

                    </li>
                @endforeach
            @endif

        </ul>

    </section>

@endsection

@section('scripts')
    <script src='{{ url('public/js/comment/send.js') }}'></script>
    <script src='{{ url('public/js/comment/like.js') }}'></script>
    <script src='{{ url('public/js/comment/delete.js') }}'></script>
    <script src='{{ url('public/js/post/like.js') }}'></script>
@endsection
