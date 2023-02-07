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
    <nav class="navbar navbar-expand-lg py-3 nav-main">
        <div class="container-fluid nav-container">
            <div class="d-flex w-100 justify-content-center" style="flex: 1" id="title">
                <a class="navbar-brand text-light fw-bold fs-3" href="#">Amazing E-Grocery</a>
            </div>
            <div id="auth">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <select name="lang" id="lang" class="form-select">
                        @foreach(config('app.available_locales') as $locale)
                            <option value="{{$locale}}">{{ strtoupper($locale) }}</option>
                        @endforeach
                    </select>
                    <li class="nav-item mx-2">
                        <a class="btn btn-warning" aria-current="page" href="/">Login</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="btn btn-primary" aria-current="page" href="/">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $("#lang").change(function (e) {
            e.preventDefault();
            console.log(e.target.value)
            // location.href =
        });
    </script>
</body>

</html>