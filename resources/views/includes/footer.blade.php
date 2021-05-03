<!-- Footer -->
<footer class="bg-dark text-center text-white w-100 mt-5 position-sticky bottom-0">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            @include('includes.social')
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links -->
        <section class="mb-4 mb-md-0">
            <h5 class="text-uppercase mb-3">Navigation</h5>

            <ul class="list-unstyled mt-0">
                @include('includes.navigation')
            </ul>
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 text-secondary" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-secondary" href="{{ route('home') }}">Forum.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
