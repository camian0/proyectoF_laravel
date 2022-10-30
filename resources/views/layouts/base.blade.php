<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <title>@yield('title')</title>
</head>
<style>
    main {
        margin-top: 40px;
        width: 100%;
    }

    .navbar {
        background-color: rgb(71, 207, 59) !important;
        font-size: 1.5rem;
    }

    .nav-link {
        color: white;
        font-weight: 450;
    }

    .nav-link:hover {
        color: rgb(33, 90, 50);
    }
</style>

<body>

    <nav class="navbar sticky-top navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    @guest
                        <li class="nav-item ">
                            <a class="nav-link" href="/login">Iniciar sesión</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-sm-12 col-md-1  col-lg-1"></div>
        <div class="col-sm-12 col-md-10 col-lg-10">
            <main>
                @yield('container')
            </main>
        </div>
        <div class="col-sm-12 col-md-1  col-lg-1"></div>
    </div>


</body>

</html>
