<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Gerencia Pontos 2000</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <header class="text-center">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark text-light" data-bs-theme='dark'>
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img class="img-thumbnail img-fluid" src="img/management.png" alt="Human-Resources" style="width:10%;">
                        Gerenciador de Pontos
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar">
                        <div class="navbar-nav">
                            <a class="nav-link active link-success" href="#">Home</a>
                            <a class="nav-link link-light" href="loGerente.php">Gerente</a>
                            <a class="nav-link link-light" href="loFuncionario.php">Funcionario</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="card bg-dark text-light col-md-5 me-2">
                    <img src="img/manager.jpg" class="card-img-top mt-2" alt="Gerenciamento">
                    <div class="card-body">
                        <h5 class="card-title">Gerentes</h5>
                        <p class="card-text">Contém funcionalidades para gerenciamento de pontos dos funcionários de seu departamento assim como os seus proprios!</p>
                        <ul class="list-group">
                            <li class="list-group-item bg-secondary">Bater ponto</li>
                            <li class="list-group-item bg-secondary">Visualizar pontos</li>
                            <li class="list-group-item bg-secondary">Editar registros</li>
                        </ul>
                    </div>
                </div>

                <div class="card bg-dark text-light col-md-5 ms-2">
                    <img src="img/emp.jpg" class="card-img-top mt-2" alt="Gerenciamento">
                    <div class="card-body">
                        <h5 class="card-title">Funcionarios</h5>
                        <p class="card-text">Contém funcionalidades basica para realização dos pontos de um funcionário do sistema, permite visualizar o histórico de pontos</p>
                        <ul class="list-group">
                            <li class="list-group-item bg-secondary">Bater ponto</li>
                            <li class="list-group-item bg-secondary">Visualizar pontos</li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>

<?php include "adm/conexao.php";

?>
