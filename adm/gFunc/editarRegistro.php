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
                        <img class="img-thumbnail img-fluid" src="../../img/management.png" alt="Human-Resources" style="width:10%;">
                        <?php
                        session_start();
                        if ($_SESSION["perfil"] == 1) {
                            header("Location : ../../index.php");
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
                            <a class="nav-link link-success active" href="../gerencia.php">Gerência</a>
                            <a class="nav-link link-light" href="../index.php">Home</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="container mt-5">
            <div class="row">
                <div class="col-6">
                    <h3 class="text-center">Editar Ponto</h3>
                    <form method="post" class="border border-secondary p-3">
                        <div class="col-12">
                            <label class="form-label">Senha de Gerente</label>
                            <input type="password" class="form-control text-center" name="senha">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Codigo da Matrícula do Funcionário</label>
                            <input type="text" class="form-control text-center" name="matricula">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Data</label>
                            <input type="date" class="form-control" name="data"></input>
                        </div>
                        <div class="col-12 text-center">
                            <div class="row">
                                <div class="col-5 ms-5">
                                    <label class="form-label">Horário de Entrada</label>
                                    <input type="time" step="1" class="form-control" name="hrE"></input>
                                </div>
                                <div class="ms-3 col-5">
                                    <label class="form-label">Horário de Saída</label>
                                    <input type="time" step="1" class="form-control" name="hrS"></input>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-danger">EDITAR</button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <img class="img-fluid" src="../../img/editar.jpg" alt="editarPonto">
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
<html>
<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    include "../conexao.php";

    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "INDEFINIDO";
    $matricula = isset($_POST["matricula"]) ? $_POST["matricula"] : "INDEFINIDO";
    $data = isset($_POST["data"]) ? $_POST["data"] : "INDEFINIDO";
    $horaEnt = isset($_POST["hrE"]) ? $_POST["hrE"] : "INDEFINIDO";
    $horaS = isset($_POST["hrS"]) ? $_POST["hrS"] : "INDEFINIDO";
    $horaEntrada = $horaEnt;
    $horaSaida = $horaS;

    //Conversão horários para comparação
    $horaEntrada = DateTime::createFromFormat("H:i:s",$horaEntrada);
    $horaSaida = DateTime::createFromFormat("H:i:s",$horaSaida);

    $diaHoje = date("Y-m-d");
    if($data < $diaHoje || $horaEntrada > $horaSaida) {
        $sql = "SELECT cd_matricula FROM funcionario WHERE cd_matricula = $matricula;";
        $res = $con->query($sql);
        $buscaDept = "SELECT cd_departamento FROM funcionario WHERE cd_matricula = $matricula;";
        
        $resB = $con->query($buscaDept)->fetch_object();
        $dept = $resB->cd_departamento;

        if($res->num_rows > 0) {
            $sql = "SELECT cd_ponto FROM ponto INNER JOIN funcionario ON cd_funcionario = cd_matricula WHERE cd_funcionario = $matricula AND dt_ponto = '$data' AND cd_departamento = $dept;";
            $res = $con->query($sql);

            if($res->num_rows > 0) {
                $sqlUpdate1 = 
                "UPDATE ponto
                    SET hr_ponto = '$horaEnt'
                    WHERE cd_funcionario = $matricula AND dt_ponto = '$data' AND cd_tipo = 1
                ;";
                $sqlUpdate2 =
                "UPDATE ponto
                    SET hr_ponto = '$horaS'
                    WHERE cd_funcionario = $matricula AND dt_ponto = '$data' AND cd_tipo = 2
                ;";

                echo 
                "
                    <div class='container mt-3 bg-success text-light text-center'>
                        <h3>PONTO ALTERADO!</h3>
                    </div>
                ";
            }
            else {
                echo 
                "
                    <div class='container mt-3 bg-danger'>
                        <h3>PONTO NÃO REGISTRADO!</h3>
                    </div>
                ";
            }
        }else {
            echo 
            "
                <div class='container mt-3 bg-danger'>
                    <h3>FUNCIONÁRIO INEXISTENTE</h3>
                </div>
            ";
        }
    }else {
        echo 
        "
            <div class='container mt-3 bg-danger'>
                <h3>DATA INVÁLIDA E/OU HORÁRIOS INVÁLIDOS</h3>
            </div>
        ";
    }
}
?>