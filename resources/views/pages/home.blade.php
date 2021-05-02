@extends('layouts.layout')

@section('title') Home @endsection

@section('content')

    <ul class="posts container">
        @foreach($posts as $post)
            <li class="post bg-dark text-white p-5 rounded position-relative">
                <a href="{{ route('posts.show', ['post' => $post]) }}" class="position-absolute d-block w-100 h-100"></a>
                <h3 class="mb-3">{{ $post['title'] }}</h3>
                <p>{{ $post['anons'] }}</p>
                <span class="text-secondary float-left">{{ $post->user['login'] }}</span>
                <time class="text-secondary float-right" datetime="{{ $post['created_at'] }}">{{ date_format($post['created_at'], 'Y-m-d') }}</time>
            </li>
        @endforeach
    </ul>

@endsection
