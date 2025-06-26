<!doctype html>
<html lang="pt-br"
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
                    <a class="nav-link active text-light" aria-current="page" href="{{ route('home') }}">Home</a>
                    <a class="nav-link text-light" href="<?= route(
                        "pessoa"
                    ) ?>">Ex1</a>
                    <a class="nav-link text-light" href="#">Ex2</a>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <h1>Acesse o Ex1 para visualizar manipulação e processamento de dados de formulários</h1>
        <h3>Arquivos utilizados</h3>
        <ul class="list-group">
            <li class="list-group-item">resources/views: Contém as páginas de exibição</li>
            <li class="list-group-item">app/http/Controllers: Os controladores de fluxo da aplicação</li>
        </ul>
        <h4>OBS: Lembre-se de realizar npm install para configurar as dependências!</h4>
    </section>
    @vite(['resources/js/app.js'])
  </body>
</html>
