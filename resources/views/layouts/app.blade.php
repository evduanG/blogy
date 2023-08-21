<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- impoting our files  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css ')}}">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">


    <title>Blogy &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        <nav class="site-nav">
            <div class="container">
                <div class="menu-bg-wrap">
                    <div class="site-navigation">
                        <div class="row g-0 align-items-center">
                            <div class="col-2">
                                <a href="{{ url('/') }}" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a>
                            </div>
                            <div class="col-8 text-center">
                                <form action="#" class="search-form d-inline-block d-lg-none">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="bi-search"></span>
                                </form>

                                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                    <li class="active"><a href="index.html">Home</a></li>

                                    <li><a href="category.html">Culture</a></li>
                                    <li><a href="category.html">Business</a></li>
                                    <li><a href="category.html">Politics</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <!-- Authentication Links -->
                                    @guest
                                    @if (Route::has('login'))
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif

                                    @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif

                                    @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest
                                </ul>

                            </div>
                            <div class="col-2 text-end">
                                <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                    <span></span>
                                </a>
                                <form action="#" class="search-form d-none d-lg-inline-block">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="bi-search"></span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        </nav> -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }} "></script>

    <script src="{{ asset('assets/js/flatpickr.min.js') }} "></script>


    <script src="{{ asset('assets/js/aos.js') }} "></script>
    <script src="{{ asset('assets/js/glightbox.min.js') }} "></script>
    <script src="{{ asset('assets/js/navbar.js') }} "></script>
    <script src="{{ asset('assets/js/counter.js') }} "></script>
    <script src="{{ asset('assets/js/custom.js') }} "></script>
</body>

</html>