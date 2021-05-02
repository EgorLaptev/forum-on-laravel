@extends('layouts.layout')

@section('title') Home @endsection

@section('content')
    @if($posts)
        <ul class="posts container align-self-start">
            @foreach($posts as $post)
                <li class="post bg-dark text-white p-5 rounded position-relative mb-4">
                    <a href="{{ route('posts.show', ['post' => $post]) }}"
                       class="position-absolute fixed-top d-block w-100 h-100"></a>
                    <h3 class="mb-3">{{ $post['title'] }}</h3>
                    <p>{{ $post['anons'] }}</p>
                    <span class="text-secondary float-left">{{ $post->user['login'] }}</span>
                    <time class="text-secondary float-right"
                          datetime="{{ $post['created_at'] }}">{{ date_format($post['created_at'], 'Y-m-d') }}</time>
                </li>
            @endforeach
            <li>
                {{ $posts->links() }}
            </li>
        </ul>
    @else
        <div class="container">
            <h2>Nothing to see :(</h2>
        </div>
    @endif

@endsection
