<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Home</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= route("home") ?>">
                <img width="30%" src="{{ asset('img/brand.png')}}" alt="iconeBrand">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <div class="navbar-nav">
                    <a class="nav-link text-light" href="{{ route('home') }}">Home</a>
                    <a class="nav-link active text-light" href="{{ route('pessoa') }}">Pessoas</a>
                </div>
            </div>
        </div>
    </nav>
    @yield('conteudo')

    @vite(['resources/js/app.js'])
</body>
</html>
