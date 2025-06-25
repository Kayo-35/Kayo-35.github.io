<?php
session_start();
include "../conexao.php";
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title>Gerencia Pontos 2000</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <form method="post">
            <div class="row">
                <div class="col-12">
                    <label class="form-label">Nome: </label>
                    <input class="form-input" type="text" required />
                </div>
                <div class="col-12">
                    <label class="form-label">Email: </label>
                    <input class="form-input" type="text" required />
                </div>
                <div class="col-12">
                    <label class="form-label">Senha: </label>
                    <input class="form-input" type="password" required />
                </div>
                <div class="col-12">
                    <select class="form-select">
                        <?php  ?>
                    </select>
                </div>
                <div class="col-12"></div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-5"></div>
                    </div>
                </div>
            </div>
        </form>
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
