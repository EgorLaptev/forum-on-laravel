@extends('layouts.layout')

@section('title') Comments @endsection

@section('links')
    <link rel="stylesheet" href="{{ url('public/css/post.css') }}">
@endsection

@section('content')

    <h1 class="mb-5 text-uppercase text-dark ">{{ $user['login'] }}'s liked comments</h1>

    {{-- Comment --}}
    @if(count($comments))
        @foreach($comments as $comment)
            <li class="container comment bg-dark text-light text-left p-4 rounded mb-3">

                @php $comment   = $comment->comment @endphp

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

    @else

        {{-- If there are no posts --}}
        <div class="container text-dark">
            <h2>Nothing to see :(</h2>
        </div>

    @endif

@endsection

@section('scripts')
    <script src='{{ url('public/js/comment/like.js') }}'></script>
    <script src='{{ url('public/js/comment/delete.js') }}'></script>
@endsection
