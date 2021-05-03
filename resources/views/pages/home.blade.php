@extends('layouts.layout')

@section('title') Home @endsection

@section('content')

    @if(count($posts))

        <ul class="posts container align-self-start">

            {{-- Posts --}}
            @foreach($posts as $post)
                <li class="post bg-dark text-white text-left p-5 rounded position-relative mb-4">

                    {{-- Link to single post page --}}
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="position-absolute fixed-top d-block w-100 h-100"></a>

                    {{-- Main post's content --}}
                    <h3 class="mb-3">{{ $post['title'] }}</h3>
                    <p>{{ $post['anons'] }}</p>

                    {{-- Other information --}}
                    <span class="text-secondary float-left">{{ $post->user['login'] }}</span>
                    <time class="text-secondary float-right" datetime="{{ $post['created_at'] }}">{{ date_format($post['created_at'], 'Y-m-d') }}</time>

                </li>
            @endforeach

            {{-- Pagination links --}}
            <li> {{ $posts->links() }} </li>

        </ul>

    @else

        {{-- If there are no posts --}}
        <div class="container text-dark">
            <h2>Nothing to see :(</h2>
        </div>

    @endif

@endsection
