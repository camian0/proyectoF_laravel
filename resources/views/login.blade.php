@extends('layouts.loginBase');
@section('title', 'Iniciar sesión')
@section('container')
    <style>
        body {
            background: rgb(247, 247, 247);
        }

        .content {
            display: flex;
            justify-content: center;
            align-content: center;
            margin-top: 30vh;
        }

        .footer-buttons a {
            margin: 10px 0;
        }

        .submit-button {
            color: white;
            background: rgb(71, 207, 59);
            border-color: rgb(71, 207, 59);
        }

        .submit-button:hover {
            color: white;
            background: rgb(59, 168, 49);
            border-color: rgb(59, 168, 49);
        }

        hr {
            color: rgb(71, 207, 59);
        }
    </style>

    <div class="content">
        <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Ingresa tu usuario</h5>
                <form action="" method="get">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                        <label for="password" name="password">Password</label>
                    </div>
                    <hr>
                    <div class="footer-buttons text-center">
                        <a href="#" class="submit-button col-12 btn">Iniciar sesión</a>
                        <a href="/" class="col-12 btn btn-light">Volver</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection
