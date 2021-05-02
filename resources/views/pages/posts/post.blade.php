@extends('layouts.layout')

@section('title') @endsection

@section('content')

    <article class="container bg-dark text-light rounded p-5">
        <h1 class="mb-4">{{ $post['title'] }}</h1>
        <p class="mb-5">{{ $post['content'] }}</p>
        <span>{{ $post['likes'] }}<i class="fas fa-heart ml-2"></i></span>
        <time class="text-secondary float-right ml-3"
              datetime="{{ $post['created_at'] }}">{{ date_format($post['created_at'], 'Y-m-d') }}</time>
        <span class="text-secondary float-right">{{ $post->user['login'] }}</span>
    </article>

    <section class="container comments mt-5 pb-5">
        <h2 class="h1 mb-4 text-center text-dark">Comments</h2>
        <ul id="commentsList">
            <li class="container text-light p-0 rounded mb-3">
                @auth()
                <form action="{{ route('comment.create', ['post_id' => $post['id']]) }}" id="commentForm" method="POST">
                    @csrf
                    <textarea name="content" placeholder="Comment" rows="5" class="form-control w-100 h-50"></textarea>
                    <input type="submit" class="form-control btn btn-success" id="sendComment" value="Send">
                </form>
                    @endauth
            </li>
            @if(count($post->comments))
                @foreach($post->comments as $comment)
                    <li class="container comment bg-dark text-light p-4 pb-5 rounded mb-3">
                        <h4 class="mb-2">{{ $comment->user['login'] }}</h4>
                        <p>{{ $comment['content'] }}</p>
                        <span class="float-left">{{ $comment['likes'] }} <i class="fas fa-heart ml-1"></i></span>
                        <time class="text-secondary float-right" datetime="">{{ $comment['created_at'] }}</time>
                    </li>
                @endforeach
            @endif
        </ul>
    </section>
@endsection

@section('scripts')
    <script src='{{ url('public/js/comment.js') }}'></script>
@endsection
