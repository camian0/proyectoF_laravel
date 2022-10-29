<x-guest-layout>
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

        .forgot {
            text-decoration: none;
            color: rgb(5, 114, 5);
        }
    </style>


    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="content">
            <x-jet-validation-errors class="mb-4" />
            <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Ingresa tu usuario</h5>
                    <form action="" method="get">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Correo" required
                                name="email" value="{{ old('email') }}">
                            <label for="email">Correo</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Contraseña" required autocomplete="current-password"
                                value="{{ old('password') }}">
                            <label for="password" name="password">Contraseña</label>
                        </div>
                        <hr>
                        <div class="footer-buttons text-center">
                            <button type="submit" class="submit-button col-12 btn">Iniciar sesión</button>
                            <a href="/" class="col-12 btn btn-light">Volver</a>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="forgot" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif

                    </form>
                </div>
            </div>
        </div>

    </form>
</x-guest-layout>
