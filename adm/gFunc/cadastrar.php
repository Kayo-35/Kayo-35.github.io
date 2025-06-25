<?php
include "../conexao.php";
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
        <header class="text-center">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark text-light" data-bs-theme='dark'>
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img class="img-thumbnail img-fluid" src="../../img/management.png" alt="Human-Resources" style="width:10%;">
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
                            <a class="nav-link link-success active" href="../gerencia.php">Gerência</a>
                            <a class="nav-link link-light" href="../index.php">Home</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="container mt-5">
            <div class="row">
                <div class="col-5">
                    <form method="post">
                        <h2 class="mt-5">Cadastrar Funcionário</h2>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Nome: </label>
                                <input class="form-control" type="text" name="nome" required />
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">Email: </label>
                                <input class="form-control" type="text" name="email" required />
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">Senha: </label>
                                <input class="form-control" type="password" name="senha" required />
                            </div>
                            <div class="col-12 mt-3">
                                <select class="form-select" name="tipo">
                                    <option selected>Selecione um tipo de funcionário</option>
                                    <?php
                                    $sql =
                                        "SELECT nm_tipo from tipoFuncionario;";
                                    $res = $con->query($sql);

                                    while ($nome = $res->fetch_object()) {
                                        echo "<option value='$nome->nm_tipo'>$nome->nm_tipo</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <select class="form-select" name="departamento">
                                    <option selected>Departamento do funcionário</option>
                                    <?php
                                    $sql =
                                        "SELECT nm_departamento FROM departamento;";
                                    $res = $con->query($sql);
                                    while ($dept = $res->fetch_object()) {
                                        echo "<option value='".$dept->nm_departamento."'>$dept->nm_departamento</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-5 ms-3 me-5">
                                        <label class="form-label">Horário de Entrada</label>
                                        <input class="form-control" type="time" name="he" step="1" required>
                                    </div>
                                    <div class="col-5 ms-3">
                                        <label class="form-label">Horário de Saída</label>
                                        <input class="form-control" type="time" name="hs" step="1" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success mt-3 align-self-center" type="submit">CADASTRAR</button>
                        </div>
                    </form>
                </div>
                <div class="col-5">
                    <img class="img-fluid img-thumbnail" src="../../img/cadastrar.jpg">
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
<html>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "INDEFINIDO";
    $email = isset($_POST["email"]) ? $_POST["email"] : "INDEFINIDO";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "senha2000";
    $horaE = isset($_POST["he"]) ? $_POST["he"] : "08:00:00";
    $horaS = isset($_POST["hs"]) ? $_POST["hs"] : "17:00:00";

    if (isset($_POST["departamento"])) {
        $sql =
            "SELECT cd_departamento FROM departamento WHERE nm_departamento = '" .
            $_POST["departamento"] .
            "';";
        $res = $con->query($sql)->fetch_object();
        $dept = $res->cd_departamento;
    } else {
        $dept = 1;
    }

    if (isset($_POST["tipo"])) {
        $sql =
            "SELECT cd_tipo FROM tipoFuncionario WHERE nm_tipo = '" .
            $_POST["tipo"] .
            "';";
        $res = $con->query($sql)->fetch_object();
        $tipo = $res->cd_tipo;
    } else {
        $tipo = 1;
    }

    $sqlChave = "SELECT MAX(cd_matricula) AS cd_matricula FROM funcionario;";
    $resChave = ($con->query($sqlChave))->fetch_object();
    $chave = $resChave->cd_matricula + 1;
    $sql = "INSERT INTO funcionario VALUES ($chave,'$senha',$dept,$tipo,'$nome','$email','$horaE','$horaS');";
    $res = $con->query($sql);

    if($res->num_rows > 0) {
        echo "
            <div class='text-center bg-success'>
                <h5>Cadastrado Com Sucesso!</h5>      
            </div>
        ";
    }else {
         echo "
            <div class='text-center bg-danger'>
                <h5>ERRO!</h5>      
            </div>
        ";
    }
}
?>
