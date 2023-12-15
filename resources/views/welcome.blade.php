<x-laravel-ui-adminlte::adminlte-layout>
    <body>
       

              <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="#page-top">City App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    @if (Route::has('login'))
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link me-lg-3" href="{{ url('/home') }}">Home</a></li>
                        @else
                        <li class="nav-item" href="{{ route('login') }}"><a class="nav-link me-lg-3" href="#download">Log In</a></li>
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('register') }}">Register</a></li>
                        @endif
                        @endauth
                    </ul>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Basic features section-->
        <section class="bg-light" style="margin-top: 60px;">
            <div id="app">
                
            </div>
        </section>

        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Your Website 2023. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>

       
      

    </body>

</x-laravel-ui-adminlte::adminlte-layout>
