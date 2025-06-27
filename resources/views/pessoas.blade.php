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
                    <a class="nav-link active text-light" href="#">Ex1</a>
                    <a class="nav-link text-light" href="#">Ex2</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="d-flex justify-content-center">
        <div class="d-flex justify-content-center w-50">
            <form
                action="{{ route('pessoa.cadastro' )}} " method="POST" class="border border-5 order-secondary rounded p-5 mt-5"
            >
                @csrf
                <h1 class="text-center mt-2 mb-2">Cadastro de Pessoas</h1>
                <div class="mb-3">
                    <label for="nm_nome" class="form-label">Nome</label>
                    <input id="nm_nome" name="nm_nome" class="form-control" type="text">
                </div>
                <div class="mb-3">
                    <label for="dt_nascimento" class="form-label">Data de Nascimento</label>
                    <input id="dt_nascimento" name="dt_nascimento" class="form-control" type="date">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="nm_email" class="form-control" name="nm_email" type="email">
                </div>
                <div class="d-flex justify-content-center">
                    <button type='submit' class='btn btn-primary'>Enviar</button>
                </div>
            </form>
            <a class="btn btn-primary" href="{{ route(pessoa.listar) }}">Listar Pessoas!</a>
        </div>
    </section>

    <!-- Modal de Exibição -->
    <div class="modal fade" id="modalSucesso" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Cadastrado!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @isset($dados)
                        <h2>Nome</h2>
                        <p>{{ $dados['nm_nome'] }}</p>
                        <h2>Data de nascimento</h2>
                        <p>{{ $dados['dt_nascimento'] }}</p>
                        <h2>Email</h2>
                        <p>{{ $dados['nm_email'] }}</p>
                    @endisset
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Erro -->
    <div class="modal fade" id="modalErro" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Erro na Validação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new bootstrap.Modal('#modalErro').show();
            });
        </script>
    @endif

    @isset($dados)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new bootstrap.Modal('#modalSucesso').show();
            });
        </script>
    @endisset
    @vite(['resources/js/app.js'])
  </body>
</html>
