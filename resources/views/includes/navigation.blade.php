<li class="nav-item active">
    <a class="nav-link text-light" aria-current="page" href="{{ route('home') }}">Home</a>
</li>
@guest()
    <li class="nav-item">
        <a class="nav-link text-secondary" href="{{ route('login') }}">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary" href="{{ route('register') }}" tabindex="-1" aria-disabled="false">Register</a>
    </li>
@endguest
@auth()
    <li class="nav-item">
        <a class="nav-link text-secondary" href="{{ route('logout') }}" tabindex="-1" aria-disabled="false">Logout</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary" href="{{ route('posts.create') }}" tabindex="-1" aria-disabled="false">Create Post</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary" href="{{ route('cabinet') }}">Сabinet</a>
    </li>
@endauth
