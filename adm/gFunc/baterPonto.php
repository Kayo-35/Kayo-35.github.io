<?php
include "../conexao.php";
session_start();
if (!isset($_SESSION["perfil"])) {
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Gerencia Pontos 2000</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body style="background-color: #adf0be;">
        <header class="text-center mb-5">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark text-light" data-bs-theme='dark'>
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img class="img-thumbnail img-fluid" src="../../img/management.png" alt="Human-Resources" style="width:10%;">
                        <?php
                            echo "Bem vindo " . $_SESSION["nome"] . "!";
                        ?>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar">
                        <div class="navbar-nav">
                            <?php 
                            if (isset($_SERVER["HTTP_REFERER"])) {
                                echo "<a class='nav-link link-success active' href='".$_SERVER["HTTP_REFERER"]."'>Página Inicial</a>";
                            } else {
                                echo "<a class='nav-link link-success active' href='../../index.php'>Página Inicial</a>";
                            } ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="container mt-5">
            <div class="row">
                <div class="card col-5 text-bg-dark">
                    <div class="card-header">
                        <h2 class="text-center">Bater Ponto</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        date_default_timezone_set("America/Sao_Paulo");
                        $data = date("Y-m-d");
                        $sql =" SELECT * FROM ponto WHERE cd_funcionario = ".$_SESSION["matricula"]." AND dt_ponto = '$data' AND cd_tipo = 1;";

                        $res = $con->query($sql);
                        if ($_POST) {
                            $horario = $_POST["hr"];
                            $matricula = $_SESSION["matricula"];
                            $sql2 = "SELECT * FROM ponto WHERE cd_funcionario = ".$_SESSION["matricula"] ." AND dt_ponto = '$data';";
                            $res2 = $con->query($sql2);

                            if ($res->num_rows == 0) {
                                $sql = "INSERT INTO ponto (cd_tipo,cd_funcionario,dt_ponto,hr_ponto) VALUES (1,$matricula,'$data','$horario');";
                                header("Location: baterPonto.php");
                                $con->query($sql);
                            } else {
                                if ($res->num_rows == 1 && $res2->num_rows < 2) {
                                    $res = $res->fetch_object();
                                    $horarioE = DateTime::createFromFormat("H:i:s",$res->hr_ponto);
                                    $horarioS = DateTime::createFromFormat("H:i:s",$horario);

                                    if ($horarioE < $horarioS) {
                                        $sql = "INSERT INTO ponto (cd_tipo,cd_funcionario,dt_ponto,hr_ponto) VALUES (2,$matricula,'$data','$horario');";
                                        header("Location: baterPonto.php");
                                        $con->query($sql);
                                    } else {
                                        echo "
                                            <div class='text-center text-light bg-danger mb-3'>
                                                <h4>HORÁRIO INVÁLIDO!</h4>
                                            </div>
                                            ";
                                    }
                                } else {
                                    echo "<div class='text-center text-light bg-danger mt-5' style='border-radius:5%;'>
                                            <h4>DIA FINALIZADO!</h4>
                                    </div>";
                                }
                            }
                        }
                        ?>

                        <form method='post'>
                            <?php echo $res->num_rows == 0 ? "<h4>Entrada</h4>" : "<h4>Saída</h4>";?>

                            <div class='row d-flex justify-content-center'>
                                <div class='col-10 mb-3'>
                                    <label class='form-label'>Data</label>
                                    <input class='form-control' type='date' value="<?= $data ?>" readonly/>
                                </div>

                                <div class='col-10 mb-3'>
                                    <label class='form-label'>Horário</label>
                                    <input class='form-control' type='time' name='hr' step='1' required />
                                </div>

                                <div class='col-3 mt-3'>
                                    <button class='btn btn-primary' type='submit'>
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-5">
                    <img src="../../img/pontoE.jpg" class="img-fluid">
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
<html>
