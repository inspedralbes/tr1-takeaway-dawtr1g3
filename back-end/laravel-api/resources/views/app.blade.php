<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentStock</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #3273dc;
        }

        .navbar-item {
            color: #fff;
        }

        .navbar-item:hover {
            background-color: #1e3f8a;
        }

        .navbar-item.is-size-3 {
            font-size: 1.5rem;
        }

        header {
            background-color: #3273dc;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .title.is-1 {
            font-size: 3rem;
            margin: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a href="http://studentstock.daw.inspedralbes.cat/" target="_blank" class="navbar-item is-size-3">
                StudentStock
            </a>
            <a class="navbar-item" href="{{ route('index') }}">
                Inici
            </a>
            <a class="navbar-item" href="{{ route('comandes') }}">
                Comandes
            </a>
            <a class="navbar-item" href="{{ route('productes') }}">
                Productes
            </a>
        </div>
    </nav>

    <header>
        <h1 class="title is-1 is-spaced ml-2 mb-5 mt-2">StudentStock</h1>
    </header>

    @yield('content')
</body>

</html>

