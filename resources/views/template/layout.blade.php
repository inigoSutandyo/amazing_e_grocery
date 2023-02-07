<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @yield('header')
</head>

<body>
    <nav class="navbar navbar-expand-lg nav-main">
        <div class="container-fluid">
            <a class="navbar-brand text-light fw-bold fs-3" href="{{ route('landing', ['locale' => app()->getLocale()]) }}">Amazing E-Grocery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link fs-6" href="/">{{__('home.home')}}</a>
                    </li>
                    @auth
                        <li class="nav-item mx-2">
                            <a class="nav-link fs-6" href="{{ route('cart.show', ['locale'=>app()->getLocale()]) }}">{{__('home.cart')}}</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link fs-6" href="/">{{__('home.profile')}}</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link fs-6" href="/">{{__('home.account_maintenance')}}</a>
                        </li>
                    @endauth
                </ul>
                <div class="navbar-nav justify-content-end d-flex">
                    @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link {{ app()->getLocale() == $locale ? 'active' : '' }}"
                                href="{{ route(Route::currentRouteName(), ['locale' => $locale]) }}">{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
                    @guest
                        <li class="nav-item mx-2">
                            <a class="btn btn-warning" aria-current="page"
                                href="{{ route('login', ['locale' => app()->getLocale()]) }}">Login</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn btn-primary" aria-current="page"
                                href="{{ route('register', ['locale' => app()->getLocale()]) }}">Register</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item mx-2">
                            <span class="nav-link">Hi, {{ auth()->user()->first_name }}</span>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn btn-primary" aria-current="page"
                                href="{{ route('logout', ['locale' => app()->getLocale()]) }}">Logout</a>
                        </li>
                    @endauth
                    </div>
            </div>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
    <footer class="nav-main d-flex justify-content-center">
        <span class="text-light fs-6 p-2">&copy; Amazing E-Grocery 2023</span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</body>

</html>
