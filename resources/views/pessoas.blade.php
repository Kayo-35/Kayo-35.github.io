@extends('base')
@section('conteudo')
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
    </div>
</section>
<div class="d-flex justify-content-center mt-3">
    <a class="btn btn-primary" href="{{ route('pessoa.listar') }}">Listar Pessoas!</a>
</div>

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

@stop
