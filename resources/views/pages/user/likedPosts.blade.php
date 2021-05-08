@extends('layouts.layout')

@section('title') Posts @endsection

@section('content')

    <h1 class="mb-5 text-uppercase text-dark ">{{ $user['login'] }}'s liked posts</h1>

    @if(count($posts))

        <ul id="postsList" class="posts container align-self-start">

            {{-- Posts --}}
            @foreach($posts as $post)
                <li class="post bg-dark text-white text-left p-5 rounded position-relative mb-4">

                    @php $post = $post->post  @endphp

                    {{-- Link to single post page --}}
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="position-absolute fixed-top d-block w-100 h-100"></a>

                    {{-- Main post's content --}}
                    <h3 class="mb-3">{{ $post['title'] }}</h3>
                    <p>{{ $post['anons'] }}</p>

                    {{-- Other information --}}
                    <span class="text-secondary float-left">
                        @if($post->user)
                            {{ $post->user['login'] }}
                        @else
                            Deleted
                        @endif
                    </span>

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
