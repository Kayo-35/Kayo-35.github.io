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
                        if (!isset($_SESSION["nome"])) {
                            header("location : ../index.php");
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
                            <?php if (isset($_SERVER["HTTP_REFERER"])) {
                                echo "<a class='nav-link link-success active' href='" .
                                    $_SERVER["HTTP_REFERER"] .
                                    "'>Página Inicial</a>";
                            } else {
                                echo "<a class='nav-link link-success active' href='../../index.php'>Página Inicial</a>";
                            } ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="container mt-5">
            <?php
            include "conexao.php";
            $selectNome =
                "SELECT nm_nome FROM funcionario WHERE cd_matricula =  " .
                $_SESSION["matricula"] .
                ";";

            $resNome = $con->query($selectNome)->fetch_object();
            $perfil = $_SESSION["perfil"];

            if ($perfil == 1) {
                $sql =
                    "SELECT cd_ponto,nm_ponto,DATE_FORMAT(dt_ponto,'%d/%m/%Y') AS dt_ponto,hr_ponto FROM ponto
                        INNER JOIN tipo_ponto ON cd_tipo_ponto = cd_tipo
                        WHERE cd_funcionario = " .
                    $_SESSION["matricula"] .
                    " ORDER BY dt_ponto DESC,hr_ponto ASC;";
                $res = $con->query($sql);

                if ($res->num_rows > 0) {
                    $sqlNome =
                        "SELECT nm_nome FROM funcionario WHERE cd_matricula = " .
                        $_SESSION["matricula"] .
                        ";";
                    $nome = $con->query($sqlNome)->fetch_object();
                    echo "<h2 class='text-center'>$nome->nm_nome</h2>
                    <table class='table text-center'>";
                    echo "
                                    <tr class='table-primary'>
                                        <th scope='col'>Codigo do Ponto</th>
                                        <th scope='col'>Tipo do Ponto</th>
                                        <th scope='col'>Data do Ponto</th>
                                        <th scope='col'>Hora do Ponto</th>
                                    </tr>
                                </thead>
                            ";
                    while ($tupla = $res->fetch_object()) {
                        echo "
                                <tbody>
                                    <tr>
                                        <td>$tupla->cd_ponto</td>
                                        <td>$tupla->nm_ponto</td>
                                        <td>$tupla->dt_ponto</td>
                                        <td>$tupla->hr_ponto</td>
                                    <tr>
                                ";
                    }
                } else {
                    echo "Nenhum ponto encontrado!";
                }
                include "est.php";
            } else {

                $sql =
                    "SELECT cd_ponto,nm_ponto,nm_nome,DATE_FORMAT(dt_ponto,'%d/%m/%Y') AS dt_ponto,hr_ponto,nm_ponto FROM ponto
                        INNER JOIN funcionario ON cd_funcionario = cd_matricula
                        INNER JOIN tipo_ponto ON ponto.cd_tipo = cd_tipo_ponto

                        WHERE cd_departamento = " .
                    $_SESSION["departamento"] .
                    "
                    AND cd_funcionario <> " .
                    $_SESSION["matricula"] .
                    "
                    ORDER BY dt_ponto DESC,nm_nome,hr_ponto ASC;";

                $res = $con->query($sql);

                $sql2 =
                    "
                        SELECT cd_ponto,nm_ponto,DATE_FORMAT(dt_ponto,'%d/%m/%Y') AS dt_ponto,hr_ponto,nm_ponto FROM ponto
                        INNER JOIN tipo_ponto ON ponto.cd_tipo = cd_tipo_ponto

                        WHERE cd_funcionario = " .
                    $_SESSION["matricula"] .
                    " ORDER BY dt_ponto DESC,hr_ponto ASC;";

                $res2 = $con->query($sql2);

                echo "
                        <div class='text-center'>
                            <h2>Funcionário $resNome->nm_nome</h2>
                        </div>
                    ";

                if ($res2->num_rows > 0) {
                    echo "
                        <table class='table'>
                            <thead>
                                <tr class='table-success'>
                                    <th scope='col'>Codigo do Ponto</th>
                                    <th scope='col'>Tipo do ponto</th>
                                    <th scope='col'>Data do Ponto</th>
                                    <th scope='col'>Hora do Ponto</th>
                                </tr>
                            </thead>
                            <tbody>
                    ";
                    while ($tupla = $res2->fetch_object()) {
                        echo "
                                <tr>
                                    <td scope='col'>$tupla->cd_ponto</th>
                                    <td scope='col'>$tupla->nm_ponto</th>
                                    <td scope='col'>$tupla->dt_ponto</th>
                                    <td scope='col'>$tupla->hr_ponto</th>
                                </tr>
                            ";
                    }
                    echo "</tbody>
                    </table>";

                    include "est.php";
                }
                ?>

                <?php if ($res->num_rows > 0) {
                    echo "
                        <div class='text-center'>
                            <h2>Funcionários do Departamento</h2>
                        </div>

                        <table class='table'>
                            <thead>
                                <tr class='table-primary'>
                                    <th scope='col'>Codigo do Ponto</th>
                                    <th scope='col'>Nome do Funcionario</th>
                                    <th scope='col'>Tipo do ponto</th>
                                    <th scope='col'>Data do Ponto</th>
                                    <th scope='col'>Hora do Ponto</th>
                                </tr>
                            </thead>";
                    while ($tupla = $res->fetch_object()) {
                        echo "
                            <tbody>
                                <tr>
                                    <td>$tupla->cd_ponto</td>
                                    <td>$tupla->nm_nome</td>
                                    <td>$tupla->nm_ponto</td>
                                    <td>$tupla->dt_ponto</td>
                                    <td>$tupla->hr_ponto</td>
                                <tr>
                            ";
                    }
                    echo "</tbody>";
                } else {
                    echo "Nenhum ponto encontrado!";
                }
            }
            ?>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
<html>
