<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Gerencia Pontos 2000</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body style="background-color: #adf0be;">
        <header class="text-center">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark text-light" data-bs-theme='dark'>
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img class="img-thumbnail img-fluid" src="../img/management.png" alt="Human-Resources" style="width:10%;">
                        <?php
                        session_start();
                        if ($_SESSION["perfil"] == 1) {
                            header("Location : ../index.php");
                        } else {
                            echo "Bem vindo " . $_SESSION["nome"] . "!";
                        }
                        ?>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar">
                        <div class="navbar-nav">
                            <a class="nav-link link-success active" href="gerencia.php">Gerência</a>
                            <a class="nav-link link-light" href="../index.php">Home</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="container mt-3 mb-3">
            <div class="row d-flex justify-content-center">
                <div class="card bg-dark text-light col-md-5 me-2">
                    <img src="../img/historico.jpg" class="card-img-top mt-2" alt="Gerenciamento">
                    <div class="card-body">
                        <h5 class="card-title">VISUALIZAR HISTORICO</h5>
                        <p class="card-text">Verifique seu historico de pontos e de seus funcionários em nossa empresa!</p>
                        <a class="btn btn-primary" type="button" href="consulta.php">Consultar</a>
                    </div>
                </div>

                <div class="card bg-dark text-light col-md-5 ms-2">
                    <img src="../img/ponto.jpg" class="card-img-top mt-2" alt="Ponto">
                    <div class="card-body">
                        <h5 class="card-title">Funcionario</h5>
                        <p class="card-text">Bata seu ponto! Lembre-se de considererar os registros de entrada e saída!</p>
                        <a class="btn btn-success" type="button" href="gFunc/baterPonto.php">Bater Ponto</a>
                    </div>
                </div>

                <div class="card bg-dark text-light col-md-5 me-2 mt-3">
                    <img src="../img/cal.jpg" class="card-img-top mt-2" alt="Ponto">
                    <div class="card-body">
                        <h5 class="card-title">Editar Registros</h5>
                        <p class="card-text">Altere registros dos pontos de funcionários de seu departamento</p>
                        <a class="btn btn-secondary" type="button" href="gFunc/editarRegistro.php">Editar Pontos</a>
                    </div>
                </div>

                <div class="card bg-dark text-light col-md-5 ms-2 mt-3">
                    <img src="../img/employee.jpg" class="card-img-top mt-2" alt="Ponto">
                    <div class="card-body">
                        <h5 class="card-title">Cadastrar Funcionário</h5>
                        <p class="card-text">Inclua novos membros de sua equipe de trabalho e edite suas propriedades</p>
                        <a class="btn btn-danger" type="button" href="gFunc/cadastrar.php">Cadastrar Funcionários</a>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
<html>
