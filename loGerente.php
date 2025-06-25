<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <title>Gerencia Pontos 2000</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body>
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
                            <a class="nav-link link-light" href="index.php"> Home</a>
                            <a class="nav-link active link-success" href="loGerente.php">Gerente</a>
                            <a class="nav-link link-light" href="loFuncionario.php">Funcionario</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="container mt-5 border border-secondary p-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <img class="img-fluid img-thumbnail" src="img/boss.jpg">
                </div>
                <form method="post" class="col-md-8">
                    <h3 class="mt-5">Acesso para Gerentes</h3>
                    <p>Caso seja um funcionário acesse a página especifica para login dos mesmos!</p>

                    <div class="mb-3 mt-5">
                        <label for="nome" class="form-label">Nome:</label>
                        <input id="nome" name="nm_nome" class="form-control" type="text" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="matricula" class="form-label">Código de Matrícula:</label>
                        <input id="matricula" name="cd_matricula" class="form-control text-center" type="text" maxlength="8" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input id="senha" name="cd_senha" class="form-control text-center" type="password" minlength="5" required>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <button type="reset" class="btn btn-primary col-md-5 me-2">Limpar Campos</button>
                        <button type="submit" class="btn btn-success col-md-5 ms-2">Submeter</button>
                    </div>

                    <?php if ($_POST) {
                        include "adm/conexao.php";

                        $sql =
                            "SELECT * FROM funcionario WHERE cd_matricula = " .
                            $_POST["cd_matricula"] .
                            " AND cd_tipo = 2 AND cd_senha = '" .
                            $_POST["cd_senha"] .
                            "';";
                        $res = $con->query($sql);
                        if ($res->num_rows > 0) {
                            session_start();
                            $_SESSION["nome"] = $_POST["nm_nome"];
                            $_SESSION["matricula"] = $_POST["cd_matricula"];
                            $_SESSION["senha"] = $_POST["cd_senha"];
                            $_SESSION["perfil"] = 2;
                            $_SESSION["papel"] = "gerente";

                            $sql =
                                "SELECT cd_departamento FROM funcionario WHERE cd_matricula = " .
                                $_POST["cd_matricula"] .
                                ";";
                            $res = $con->query($sql);
                            $res = $res->fetch_object();
                            $_SESSION["departamento"] = $res->cd_departamento;
                            header("Location: adm/gerencia.php");
                        } else {
                            echo '
                                    <div class="card bg-danger text-light text-center mt-3">
                                        <div class="card-body">
                                            <h5 class="card-title">ERRO AO LOGAR!</h5>
                                            <p class="card-text">Verifique os dados inseridos e tente novamente!</p>
                                        </div>
                                    </div>
                                ';
                        }
                    } ?>
                </form>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
