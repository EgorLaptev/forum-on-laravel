<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto mb-2 mb-md-0">
                @include('includes.navigation')
            </ul>
            <form class="d-flex" id="searchPost">
                <input class="form-control mr-2" id="searchInput" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">ОК</button>
            </form>
        </div>
    </div>
</nav>
