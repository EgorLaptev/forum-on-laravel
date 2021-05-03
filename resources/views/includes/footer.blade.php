<!-- Footer -->
<footer class="bg-dark text-center text-white w-100 mt-5 position-sticky bottom-0">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn text-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
                ></a>

            <!-- Twitter -->
            <a class="btn text-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
                ></a>

            <!-- Google -->
            <a class="btn text-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
                ></a>

            <!-- Instagram -->
            <a class="btn text-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
                ></a>

            <!-- Linkedin -->
            <a class="btn text-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
                ></a>

            <!-- Github -->
            <a class="btn text-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
                ></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="">
                <!--Grid column-->
                <div class=" mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-3">Navigation</h5>

                    <ul class="list-unstyled mt-0">
                        <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                        @guest()
                        <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-white">Register</a></li>
                        @endguest
                        @auth()
                        <li><a href="{{ route('logout') }}" class="text-white">Logout</a></li>
                        @endauth
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 text-secondary" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-secondary" href="https://mdbootstrap.com/">Forum.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
