<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
            <div class="container">
                <a class="navbar-brand fw-bold text-info" href="{{ route('evento.index') }}">
                    IFMS Eventos
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('evento.index') }}">
                                Eventos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="">
                                Nova Inscrição
                            </a>
                        </li>
                    </ul>

                    <span class="navbar-text text-white-50 fs-7">
                        Painel Administrativo
                    </span>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
