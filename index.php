<?php
include_once "./php/conexao.php"; //Eu inclui o conteúdo do arquivo "conexao.php" no código atual, permitindo a reutilização de funcionalidades. O "once" garante que o arquivo seja incluído apenas uma vez.


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Caminho do CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!--Caminho do CSS-->
    <link rel="stylesheet" href="./assets/css/style.css">

    <title>OPOVO CRUD</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark mb-5 ps-5 pe-5 pt-3 pb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.opovo.com.br/" target="_blank" ><img src="./assets/img/opovo-logo.svg" alt="logo da OPOVO"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" class = "text__header">
                <li class="nav-item">
                <a class="navbar-text text-light text-decoration-none" aria-current="page" href="https://github.com/Samueldsoliveira/crud-opovo" target = "_blank">Repositório</a>
            </ul>
            <span class="navbar-text text-light">
                CRUD Samuel Oliveira
            </span>
            </div>
        </div>
    </nav>

    <div class = "container">
        <div class = "row">
            <div class = "col-lg-12">
                <div>
                    <h4>Listagem de usuários</h4>
                </div>
            </div>
        </div>

        <hr>
        
        <div class = "row">
            <div class = "col-lg-12">
                <div class = "table-responsive">
                    <table class = "table table-striped table-bordered">
                        <thead> <!--Cabeçalho da tabela-->
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody> <!--Corpo da tabela-->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!--Caminho do JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="./assets/js/custom.js"></script> <!--Caminho do JavaScript-->
</body>
</html>