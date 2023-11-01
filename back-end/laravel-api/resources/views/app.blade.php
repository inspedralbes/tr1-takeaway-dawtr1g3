<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentStock</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item is-size-3" href="http://studentstock.daw.inspedralbes.cat/" target="_blank">
                StudentStock
            </a>
            <a class="navbar-item" href="{{ route ('comandes') }}">
                Comandes
            </a>
            <a class="navbar-item" href="{{ route ('productes') }}">
                Productes
            </a>
        </div>
    </nav>

    <header>
        <h1 class="title is-1 is-spaced">StudentStock</h1>
    </header>

    @yield('content')
</body>

</html>

